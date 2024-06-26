<?php

namespace App\Http\Controllers\Backend\Partner;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Partner;
use App\Models\PartnerJoin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class JoinController extends Controller
{
    # construct
    public function __construct()
    {
    }

    public function index(Request $request){
        $searchKey = null;
        $is_published = null;

        $pages = PartnerJoin::where('type_join', 'influencer')->orderBy('name','ASC');
        if ($request->search != null) {
            $pages = $pages->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }


        $pages = $pages->paginate(paginationNumber());
        return view('backend.pages.partner.join.influencer.index', compact('pages', 'searchKey'));
    }

    public function index_partner(Request $request){
        $searchKey = null;
        $is_published = null;

        $pages = PartnerJoin::where('type_join', 'partner')->orderBy('name','ASC');
        if ($request->search != null) {
            $pages = $pages->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }


        $pages = $pages->paginate(paginationNumber());
        return view('backend.pages.partner.join.partner.index', compact('pages', 'searchKey'));
    }

    public function index_community(Request $request){
        $searchKey = null;
        $is_published = null;

        $pages = PartnerJoin::where('type_join', 'community')->orderBy('name','ASC');
        if ($request->search != null) {
            $pages = $pages->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }


        $pages = $pages->paginate(paginationNumber());
        return view('backend.pages.partner.join.community.index', compact('pages', 'searchKey'));
    }
}