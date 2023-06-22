<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FollowerRequest;
use App\Models\ContactInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{
    public function index()
    {
        $visitor = User::where('role_as', 3)->get();
        return view('admin.visitor.index', compact('visitor'));
    }

    public function create()
    {
        return view('admin.visitor.create');
    }

    public function store(FollowerRequest $request)
    {
        $user = new User();
        $user->name = $request->firstname;
        $user->email = $request->email;
        $user->password = Hash::make('Test@123');
        $user->role_as = 3;
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
        return redirect('admin/visitor')->with('message', 'Visitor Added Successfully');
    }

    public function edit($id)
    {
        $visitor = User::find($id);
        return view('admin.visitor.edit', compact('visitor'));
    }

    public function update(FollowerRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->firstname;
        $user->email = $request->email;
        $user->password = Hash::make('Test@123');
        $user->role_as = 3;
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
        return redirect('admin/visitor')->with('message', 'Visitor Updated Successfully');
    }

    public function destroy($id)
    {
        $visitor = User::find($id);
        if ($visitor) {
            ContactInfo::where('user_id', $visitor->id)->Delete();
            $visitor->delete();
            return redirect('admin/visitor')->with('message', 'Visitor Deleted Successfully');
        } else {
            return redirect('admin/visitor')->with('message', 'No Visitor Id Found');
        }
    }
}
