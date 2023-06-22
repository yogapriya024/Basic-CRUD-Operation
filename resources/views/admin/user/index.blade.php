@extends('layouts.user')
@section('title','View Task')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                View Task
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Assign By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($viewTask as $item)
                        <tr>
                    <td>{{$item->task_name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->manager->name}}</td>
                    <td>{{$statuses[$item->status]}}</td>
                    <td>
                        <a href="{{url('user/edit-Usertask/'.$item->id)}}" class="btn btn-success">Edit</a>
                    </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
