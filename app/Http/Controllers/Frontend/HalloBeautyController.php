<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Page;
use App\Models\Brand;
use Illuminate\Http\Request;
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
    public function listDokter()
    {
        $sliders = [];
        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }

        return getView('pages.halloBeauty.searchDokter', ['sliders' => $sliders,]);
    }

    # janji temu
    public function janjitemu($slug)
    {
        $sliders = [];
        if (getSetting('hero_sliders') != null) {
            $sliders = json_decode(getSetting('hero_sliders'));
        }

        $dokter_resume = DB::table('users')->where('user_type', 'dokter')->where('name', $slug)->get();

        return getView('pages.halloBeauty.janjiTemu', ['sliders' => $sliders, 'dokter_resume' => $dokter_resume]);
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

}
