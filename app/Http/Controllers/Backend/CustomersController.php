<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Testimoni;

class CustomersController extends Controller
{

    # construct
    public function __construct()
    {
        $this->middleware(['permission:customers'])->only('index');
        $this->middleware(['permission:ban_customers'])->only(['updateBanStatus']);
    }

    # customer list
    public function index(Request $request)
    {
        $searchKey = null;
        $is_banned = null;

        $customers = User::where('user_type', 'customer')->latest();
        if ($request->search != null) {
            $customers = $customers->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        if ($request->is_banned != null) {
            $customers = $customers->where('is_banned', $request->is_banned);
            $is_banned    = $request->is_banned;
        }

        $customers = $customers->paginate(paginationNumber());
        return view('backend.pages.customers.index', compact('customers', 'searchKey', 'is_banned'));
    }


    public function testimoni(Request $request)
    {
        $searchKey = null;
        $is_banned = null;

        $testimoni = Testimoni::select('users.name', 'product_testimoni.id as testi_id', 
                                       'product_testimoni.rating', 'product_testimoni.title', 
                                       'product_testimoni.comment', 'product_testimoni.created_at as tgl_komen', 
                                       'products.created_at as tglcreate', 'products.name as namaproduk',
                                       'product_testimoni.is_banned')
                     ->leftJoin('users', 'users.id', '=', 'product_testimoni.customer_id')
                     ->leftJoin('products', 'products.id', '=', 'product_testimoni.product_id')
                     ->where('users.user_type', 'customer')
                     ->orderBy('products.created_at', 'ASC')
                     ->get();
        // dd($testimoni);
        // if ($request->search != null) {
        //     $testimoni = $testimoni->where('name', 'like', '%' . $request->search . '%')
        //         ->orWhere('email', 'like', '%' . $request->search . '%');
        //     $searchKey = $request->search;
        // }

        if ($request->is_banned != null) {
            $testimoni = $testimoni->where('is_banned', $request->is_banned);
            $is_banned    = $request->is_banned;
        }

        // $testimoni = $testimoni->paginate(paginationNumber());
        return view('backend.pages.customers.testimoni', compact('testimoni', 'searchKey', 'is_banned'));
    }

    # update status 
    public function updateBanStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->is_banned = $request->status;
        if ($user->save()) {
            return 1;
        }
        return 0;
    }

    public function updateBanTestiStatus(Request $request)
    {
        $testimoni = Testimoni::findOrFail($request->id);
        $testimoni->is_banned = $request->status;
        if ($testimoni->save()) {
            return 1;
        }
        return 0;
    }
}
