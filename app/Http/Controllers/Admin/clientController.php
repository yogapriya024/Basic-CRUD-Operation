<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Http\Requests\Admin\FollowerRequest;
use App\Models\ContactInfo;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class clientController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return view('admin.manager.index', compact('event'));
    }

    public function create()
    {
        $user = User::where('role_as', 3)->get();
        return view('admin.manager.create', compact('user'));
    }

    public function store(EventRequest $request)
    {
        $event = new Event();
        $event->task_name = $request->task_name;
        $event->description = $request->description;
        $event->user_id = $request->user_id;
        $event->save();
        return redirect('manager/task')->with('message', 'Task Added Successfully');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $user = User::where('role_as', 3)->get();
        return view('admin.manager.edit', compact('event', 'user'));
    }

    public function update(EventRequest $request, $id)
    {
        $event = Event::find($id);
        $event->task_name = $request->task_name;
        $event->description = $request->description;
        $event->user_id = $request->user_id;
        $event->save();
        return redirect('manager/task')->with('message', 'Task Updated Successfully');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return redirect('manager/task')->with('message', 'Task Deleted Successfully');
        } else {
            return redirect('manager/task')->with('message', 'No Task Id Found');
        }
    }

    public function editProfile ($id)
    {
        $editProfile = User::find($id);
        return view('admin.manager.editProfile', compact('editProfile'));
    }

    public function updateProfile (FollowerRequest $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->firstname;
        $user->email = $request->email;
        $user->password = Hash::make('Test@123');
        $user->role_as = 2;
        $user->save();
        if ($request->image) {
            $getContactInfo = ContactInfo::where('user_id', $user->id)->first();
            if ($getContactInfo->image) {
                $destination = 'uploads/follower'.$getContactInfo->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/follower/', $filename);
        }
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
            'image' =>  ($request->hasFile('image')) ? $filename : null,
        ]);
        return redirect('manager/edit-manager/'. $id)->with('message', 'Profile Updated Successfully');
    }
}
