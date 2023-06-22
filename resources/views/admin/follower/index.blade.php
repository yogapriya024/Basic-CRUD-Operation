@extends('layouts.master')
@section('title','Follower')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Follower <a href="{{url('admin/add-user')}}" class="btn btn-primary btn-sm float-end">Add Follower</a></h4>
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Follower Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($follower as $item)
                            <tr>
                                <td>
                                    @if ($item->contactInfo)
                                        {{$item->contactInfo->firstname}} {{$item->contactInfo->lastname}}
                                    @endif
                                    </td>
                                <td>{{$item->email}}</td>
                                <td> @if ($item->contactInfo)
                                        {{$item->contactInfo->country}}
                                    @endif</td>
                                <td>
                                    <a href="{{url('admin/edit-user/'.$item->id)}}" class="btn btn-success">Edit</a>

                                    <a href="{{url('admin/delete-user/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
