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
                    ->where('users.is_banned', 0)
                    ->latest();

        if ($request->search != null) {
            $dokter = $dokter->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        $dokter = $dokter->paginate(paginationNumber(1));

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

}
