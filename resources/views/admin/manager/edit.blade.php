@extends('layouts.manager')
@section('title','Task')
@section('content')
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Task</li>
        </ol>
        <div class="row">

        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="">Edit Task</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('manager/update-task/'.$event->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="task_name">TaskName</label>
                        <input type="text" name="task_name" id="task_name" class="form-control"  value="{{$event->task_name}}"placeholder="Task Name">
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="description">TaskDescription</label>
                        <input type="text" name="description" id="description" class="form-control"  value="{{$event->description}}"placeholder="Task Name">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="user_type">Assign To</label>
                                    <select name="user_id" class="form-control">
                                        @foreach($user as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                @foreach($statusType  as $key => $item)
                                    <option value="{{$key}}">
                                        {{$item}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Update Follower</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
