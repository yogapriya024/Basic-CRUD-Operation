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

class UserController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $taskCompleted = Event::where('user_id', $userId)->where('status', 1)->count();
        $taskInCompleted = Event::where('user_id', $userId)->where('status', 0)->count();
        $taskInProgress = Event::where('user_id', $userId)->where('status', 2)->count();
        $taskInitiated = Event::where('user_id', $userId)->where('status', 3)->count();
        return view('admin.user.dashboard', compact('taskInProgress', 'taskInitiated', 'taskCompleted', 'taskInCompleted'));
    }

    public function getTask($id)
    {
        $viewTask = Event::with('manager')->where('user_id', $id)->get();
        $statuses = Event::STATUS;
        return view('admin.user.index', compact('viewTask', 'statuses'));
    }

    public function editTask($id)
    {
        $event = Event::find($id);
        $statusType = Event::STATUS;
        return view('admin.user.editUserTask', compact('event', 'statusType'));
    }

    public function updateTask(Request $request, $id)
    {
        $event = Event::find($id);
        $event->status =$request->status;
        $event->save();
        return redirect('user/edit-Usertask/'.$id)->with('message', 'Task status Updated Successfully');
    }

    public function editProfile ($id)
    {
        $editProfile = User::find($id);
        return view('admin.user.editProfile', compact('editProfile'));
    }

    public function updateProfile (FollowerRequest $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->email;
        $user->save();
        $getContactInfo = ContactInfo::where('user_id', $user->id)->first();
        if ($request->image) {
            $destination = 'uploads/follower'.$getContactInfo->image;
            if (File::exists($destination)) {
                File::delete($destination);
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
            'image' =>  ($request->image) ? $filename : $getContactInfo->image,
        ]);
        return redirect('user/edit-endUser/'.$id)->with('message', 'Profile Updated Successfully');
    }

    public function indexTaskCompleted($id)
    {
        $taskCompleted = Event::where('user_id', $id)->where('status', 1)->count();
        return view('admin.manager.dashboard', compact('taskCompleted'));
    }

    public function indexTaskInCompleted($id)
    {
        $taskInCompleted = Event::where('user_id', $id)->where('status', 0)->count();
        return view('admin.manager.dashboard', compact('taskInCompleted'));
    }
}
