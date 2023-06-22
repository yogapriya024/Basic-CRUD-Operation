<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\FollowerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class FollowerController extends Controller
{
    public function index()
    {
        $follower = User::where('role_as', 2)->get();
        return view('admin.follower.index', compact('follower'));
    }

    public function create()
    {
        return view('admin.follower.create');
    }

    public function store(FollowerRequest $request)
    {
        $user = new User();
        $user->name = $request->firstname;
        $user->email = $request->email;
        $user->password = Hash::make('Test@123');
        $user->role_as = 2;
        $user->save();
        $user->contactInfo()->create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' =>$request->mobile,
            'address1' => $request->address1,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'status' => 1,
            'user_id' => $user->id,
        ]);
        return redirect('admin/user')->with('message', 'Follower Added Successfully');
    }

    public function edit($id)
    {
        $follower = User::find($id);
        return view('admin.follower.edit', compact('follower'));
    }

    public function update(FollowerRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->firstname;
        $user->email = $request->email;
        $user->password = Hash::make('Test@123');
        $user->role_as = 2;
        $user->save();
        $user->contactInfo()->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' =>$request->mobile,
            'address1' => $request->address1,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'status' => 1,
            'user_id' => $user->id,
        ]);
        return redirect('admin/user')->with('message', 'Follower Updated Successfully');
    }

    public function destroy($id)
    {
        $follower = User::find($id);
        if ($follower) {
            ContactInfo::where('user_id', $follower->id)->Delete();
             $follower->delete();
            return redirect('admin/user')->with('message', 'Follower Deleted Successfully');
        } else {
            return redirect('admin/user')->with('message', 'No Follower Id Found');
        }
    }
}
