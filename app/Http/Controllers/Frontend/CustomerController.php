<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\MediaManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

class CustomerController extends Controller
{
    # customer dashbaord
    public function index()
    {
        return getView('pages.users.dashboard');
    }

    # customer's order history
    public function orderHistory()
    {
        $orders = auth()->user()->orders()->latest()->paginate(paginationNumber());
        return getView('pages.users.orderHistory', ['orders' => $orders]);
    }

    # customer's address
    public function address()
    {
        $user = auth()->user();
        $addresses = $user->addresses()->latest()->get();
        $countries = Country::isActive()->get();

        return getView('pages.users.address', [
            'addresses' => $addresses,
            'countries' => $countries,
        ]);
    }

    # customer's profile
    public function profile()
    {
        $user = auth()->user();
        return getView('pages.users.profile', ['user' => $user]);
    }

    # update profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        if ($request->type == "info") {
            # update info
            $request->validate(
                [
                    'avatar' => 'nullable|max:4000|mimes:jpeg,png,webp,jpg'
                ],
                [
                    'avatar.max' => 'Max file size is 4MB!'
                ]
            );

            if ($request->hasFile('avatar')) {
                $mediaFile = new MediaManager;
                $mediaFile->user_id = auth()->user()->id;
                $mediaFile->media_file = $request->file('avatar')->store('uploads/media');
                $mediaFile->media_size = $request->file('avatar')->getSize();
                $mediaFile->media_name = $request->file('avatar')->getClientOriginalName();
                $mediaFile->media_extension = $request->file('avatar')->getClientOriginalExtension();

                if (getFileType(Str::lower($mediaFile->media_extension)) != null) {
                    $mediaFile->media_type = getFileType(Str::lower($mediaFile->media_extension));
                } else {
                    $mediaFile->media_type = "unknown";
                }
                $mediaFile->save();
                $user->avatar = $mediaFile->id;
            }

            $user->name             = $request->name;
            $user->phone            = validatePhone($request->phone);
            $user->nama_depan       = $request->nama_depan;
            $user->nama_belakang    = $request->nama_belakang;
            $user->jenis_kelamin    = $request->jenis_kelamin;
            $user->tanggal_lahir    = $request->tanggal_lahir;
            $user->biodata          = $request->biodata;
            $user->negara           = $request->negara;
            $user->kab_kota         = $request->kab_kota;
            $user->save();
            flash(localize('Profile updated successfully'))->success();
            return back();
        }
        else {
            # update password
            $request->validate(
                [
                    'password' => 'required|confirmed|min:6'
                ]
            );
            $user->password = Hash::make($request->password);
            $user->save();
            flash(localize('Password updated successfully'))->success();
            return back();
        }
    }

    public function article()
    {}

    public function photo()
    {}

    public function video()
    {}

    public function review()
    {}

    public function event()
    {}
}
