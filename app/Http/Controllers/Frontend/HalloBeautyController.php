<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Page;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\JadwalDokter;
use App\Models\ProductCategory;

use App\Models\JanjiTemu;
use App\Models\Order;
use App\Models\OrderGroup;


use Mail;
use App\Mail\EmailManager;
use DB;

class HalloBeautyController extends Controller
{
    # set theme
    public function theme($name = "")
    {
        session(['theme' => $name]);
        return redirect()->route('home');
    }

    # hallo beauty page
    public function index()
    {

        $sliders = [];
        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }
        return getView('pages.halloBeauty.index', ['sliders' => $sliders]);

    }

    # all dokter
    public function listDokter(Request $request)
    {
        $sliders = [];
        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }

        $searchKey  = null;
        $dokter = DB::table('users')
                    ->leftJoin('jadwal_dokters', 'jadwal_dokters.id_dokter', '=', 'users.id')
                    ->where('users.user_type', 'dokter')
                    ->where('users.is_banned', 0);

        if ($request->search != null) {
            $dokter = $dokter->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        $dokter = $dokter->paginate(paginationNumber(9));

        return getView('pages.halloBeauty.searchDokter',
                        ['sliders' => $sliders , 'dokter' => $dokter , 'searchKey' => $searchKey]);
    }

    #List Paket
    public function listPaket(Request $request)
    {
        $sliders = [];
        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }

        $searchKey = null;
        $per_page = 9;
        $sort_by = $request->sort_by ? $request->sort_by : "new";
        $maxRange = Product::max('max_price');
        $min_value = 0;
        $max_value = formatPrice($maxRange, false, false, false, false);

        $products = Product::select('products.id', 'products.name as namaproduk', 'products.min_price', 'categories.name', 'products.created_at')
                    ->leftJoin('product_categories', 'product_categories.product_id', '=', 'products.id')
                    ->leftJoin('categories', 'categories.id', '=', 'product_categories.category_id')
                    ->where('products.brand_id', 7);

        # conditional - search by
        if ($request->search != null) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        # pagination
        if ($request->per_page != null) {
            $per_page = $request->per_page;
        }

        # sort by
        if ($sort_by == 'new') {
            $products = $products->latest();
        } else {
            $products = $products->orderBy('total_sale_count', 'DESC');
        }

        # by price
        if ($request->min_price != null) {
            $min_value = $request->min_price;
        }
        if ($request->max_price != null) {
            $max_value = $request->max_price;
        }

        if ($request->min_price || $request->max_price) {
            $products = $products->where('min_price', '>=', priceToUsd($min_value))->where('min_price', '<=', priceToUsd($max_value));
        }

        # by category
        if ($request->category_id && $request->category_id != null) {
            $product_category_product_ids = ProductCategory::where('category_id', $request->category_id)->pluck('product_id');
            $products = $products->whereIn('id', $product_category_product_ids);
        }

        # by brand
        if ($request->brand_id && $request->brand_id != null) {
            // $product_category_product_ids = Product::where('brand_id', $request->brand_id)->get();
            // dd($request->brand_id);
            $products = $products->where('brand_id', $request->brand_id);
        }

        # by tag
        if ($request->tag_id && $request->tag_id != null) {
            $product_tag_product_ids = ProductTag::where('tag_id', $request->tag_id)->pluck('product_id');
            $products = $products->whereIn('id', $product_tag_product_ids);
        }
        # conditional

        $products = $products->paginate(paginationNumber($per_page));

        return getView('pages.halloBeauty.searchPaket',
                        ['sliders' => $sliders , 'products' => $products , 'searchKey' => $searchKey]);
    }

    # profile dokter
    public function dokter($slug)
    {
        $sliders = [];
        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }

        $slug = str_replace('-', ' ', $slug);
        $dokter = DB::table('users')->where('user_type', 'dokter')->where('name', $slug)->first();

        $jd = JadwalDokter::join('users','users.id','=','jadwal_dokters.id_dokter')
            ->where('users.name', '=',  $dokter->name)->get();

        // dd($dokter->name);

        if(!empty($dokter)){
            return getView('pages.halloBeauty.profileDokter', ['sliders' => $sliders, 'dokter' => $dokter, 'jd' => $jd]);
        }else{
            return abort(404);
        }
    }

    #simpan janji temu dokter by user id
    public function saveJanjiTemu(Request $request)
    {
        $user = auth()->user();

        // dd($request);
        if($user == null){
            flash(localize('Please Sign In'))->success();
            return redirect()->route('login');
        }

        $userId = auth()->user()->id;
        # create new order group
        $orderGroup                                     = new OrderGroup;
        $orderGroup->user_id                            = $userId;
        $orderGroup->shipping_address_id                = '-';
        $orderGroup->billing_address_id                 = '-';
        $orderGroup->location_id                        = session('stock_location_id');
        $orderGroup->phone_no                           = 0;
        $orderGroup->alternative_phone_no               = 0;
        $orderGroup->sub_total_amount                   = 0;
        $orderGroup->total_tax_amount                   = 0;
        $orderGroup->total_coupon_discount_amount       = 0;
        $orderGroup->total_shipping_cost                = 0;
        $orderGroup->total_tips_amount                  = 0; // convert to base price;
        $orderGroup->grand_total_amount                 = 0;
        $orderGroup->payment_status                     = "unpaid";
        $orderGroup->save();

        # janji temu
        $janjiTemu = new JanjiTemu;
        $janjiTemu->id_dokter           = $request->id_dokter;
        $janjiTemu->user_id             = $userId;
        $janjiTemu->jam                 = $request->jam;
        $janjiTemu->hari                = $request->jadwal;
        $janjiTemu->save();

        # order -> todo::[update version] make array for each vendor, create order in loop
        $order = new Order;
        $order->order_group_id  = $orderGroup->id;
        $order->janjitemu_id    = $janjiTemu->id;
        $order->transfer_id     = $request->id_dokter;
        $order->shop_id         = 1;
        $order->user_id         = $userId;
        $order->location_id     = session('stock_location_id');

        $order->total_admin_earnings            = 0;
        $order->logistic_id                     = '';
        $order->logistic_name                   = '-';
        $order->shipping_delivery_type          = 'Janji Temu';
        $order->scheduled_delivery_info         = 0;

        $order->shipping_cost                   = 0; // todo::[update version] calculate for each vendors
        $order->tips_amount                     = 0; // todo::[update version] calculate for each vendors

        $order->reward_points = 0;
        $order->save();

        $userEmail = auth()->user()->email;
        if (env('MAIL_USERNAME') != null) {
            //sends newsletter to subscribed users
            $array['view'] = 'emails.newAccount';
            $array['subject'] = 'Community Join';
            $array['from'] = env('MAIL_FROM_ADDRESS');
            $array['email'] = $userEmail;
            $array['content'] = 'Pesan janji temu';
            try {
                Mail::to($userEmail)->queue(new EmailManager($array));
            } catch (\Exception $e) {
                // dd($e, $emailData);
            }

        } else {
            flash(localize('Please configure SMTP first'))->error();
            return back();
        }

        flash(localize('Your appointment has been sent'))->success();
        return back();
    }


}
