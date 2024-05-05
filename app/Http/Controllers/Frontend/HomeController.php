<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    # set theme
    public function theme($name = "")
    {
        session(['theme' => $name]);
        return redirect()->route('home');
    }

    # homepage
    public function index()
    {

        $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : []; 

        $product = DB::table('products')->select('id')->where('is_published', '1')->get();

        $categori = DB::table('categories')->select('id')->get();


        foreach($product as $key => $val){
            $product_val[$key] = $val->id;
        }

        foreach($categori as $key => $val){
            $product_cat[$key] = $val->id;
        }

        dd($product_cat);

        $blogs = Blog::isActive()->latest()->take(3)->get();

        $sliders = [];
        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }

        $brands = Brand::get();
        $banner_section_one_banners = [];
        if (getSetting('banner_section_one_banners') != null) {
            $banner_section_one_banners = json_decode(getSetting('banner_section_one_banners'));
        }

        $banner_section_two_banner_one = [];
        if (getSetting('banner_section_two_banner_one') != null) {
            $banner_section_two_banner_one = json_decode(getSetting('banner_section_two_banner_one'));
        }

        $banner_section_two_banner_two = [];
        if (getSetting('banner_section_two_banner_two') != null) {
            $banner_section_two_banner_two = json_decode(getSetting('banner_section_two_banner_two'));
        }

        $client_feedback = [];
        if (getSetting('client_feedback') != null) {
            $client_feedback = json_decode(getSetting('client_feedback'));
        }

        $trending1 = Blog::where('placement','1')->isActive()->latest()->take(1)->get();
        $trending2 = Blog::where('placement','2')->isActive()->latest()->take(1)->get();
        $trending3 = Blog::where('placement','3')->isActive()->latest()->take(1)->get();


        return getView('pages.home', ['blogs' => $blogs,
            'product_list' => $product_val,
            'product_cat' => $product_cat,
            'trending1' => $trending1, 'trending2' => $trending2, 'trending3' => $trending3,
            'sliders' => $sliders, 'brands' => $brands,
            'banner_section_one_banners' => $banner_section_one_banners,
            'banner_section_two_banner_one' => $banner_section_two_banner_one,
            'banner_section_two_banner_two' => $banner_section_two_banner_two,
            'client_feedback' => $client_feedback]);
    }

    # all brands
    public function allBrands()
    {
        return getView('pages.brands');
    }

    # all categories
    public function allCategories()
    {
        return getView('pages.categories');
    }

    # all coupons
    public function allCoupons()
    {
        return getView('pages.coupons.index');
    }

    # all offers
    public function allOffers()
    {
        return getView('pages.offers');
    }

    # all blogs
    public function allBlogs(Request $request)
    {
        $searchKey  = null;
        $blogs = Blog::isActive()->latest();

        if ($request->search != null) {
            $blogs = $blogs->where('title', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        if ($request->category_id != null) {
            $blogs = $blogs->where('blog_category_id', $request->category_id);
        }

        $blogs = $blogs->paginate(paginationNumber(5));
        return getView('pages.blogs.index', ['blogs' => $blogs, 'searchKey' => $searchKey]);
    }

    # blog details
    public function showBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return getView('pages.blogs.blogDetails', ['blog' => $blog]);
    }

    # get all campaigns
    public function campaignIndex()
    {
        return getView('pages.campaigns.index');
    }

    # campaign details
    public function showCampaign($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();
        return getView('pages.campaigns.show', ['campaign' => $campaign]);
    }

    # about us page
    public function aboutUs()
    {
        $features = [];

        if (getSetting('about_us_features') != null) {
            $features = json_decode(getSetting('about_us_features'));
        }

        $why_choose_us = [];

        if (getSetting('about_us_why_choose_us') != null) {
            $why_choose_us = json_decode(getSetting('about_us_why_choose_us'));
        }

        $sliders = [];
        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }

        return getView('pages.quickLinks.aboutUs', ['features' => $features, 'why_choose_us' => $why_choose_us, 'sliders' => $sliders]);
    }

    # partner page
    public function partner()
    {
        $pages = Partner::orderBy('id','ASC')->groupBy('title')->get();

        $pagesContent = Partner::orderBy('id','ASC')->groupBy('title')->get();

        return getView('pages.partner.index', ['pages' => $pages, 'pagesContent' => $pagesContent ]);
    }


    # euterria nano academy page
    public function euterriaNanoAcademy(Request $request)
    {
        $searchKey  = null;
        $blogs = Blog::isActive()->latest();

        if ($request->search != null) {
            $blogs = $blogs->where('title', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        if ($request->category_id != null) {
            $blogs = $blogs->where('blog_category_id', $request->category_id);
        }

        $blogs = $blogs->paginate(paginationNumber(5));
        return getView('pages.euterria-nano-academy.index', ['blogs' => $blogs, 'searchKey' => $searchKey]);
    }

    # contact us page
    public function contactUs()
    {
        return getView('pages.quickLinks.contactUs');
    }

    # quick link / dynamic pages
    public function showPage($slug)
    {

        $page = Page::where('slug', $slug)->first();

        if(!empty($page)){
            if($page->slug == 'vegetology' || $page->slug == 'pion-tech' ||
                $page->slug == 'shinsiaview' || $page->slug == 'leaf-coco' ||
                $page->slug == 'bain-co'
                )
            {
                $sliders = [];
                if (getSetting('hero_sliders') != null) {
                    $sliders = json_decode(getSetting('hero_sliders'));
                }
                return getView('pages.quickLinks.aboutPages', ['page' => $page, 'sliders' => $sliders]);
            }else{
                return getView('pages.quickLinks.index', ['page' => $page]);
            }
        }else{
            return abort(404);
        }
    }
}
