@extends('layouts.manager')
@section('title','Task')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Task <a href="{{url('manager/add-task')}}" class="btn btn-primary btn-sm float-end">Add Task</a></h4>
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
                        <th>Assign To</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($event as $item)
                            <tr>
                                <td>
                                    {{$item->task_name}}
                                    </td>
                                <td>{{$item->description}}</td>
                                <td>
                                        {{$item->user->name}}
                                   </td>
                                <td>
                                    <a href="{{url('manager/edit-task/'.$item->id)}}" class="btn btn-success">Edit</a>

                                    <a href="{{url('manager/delete-task/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
