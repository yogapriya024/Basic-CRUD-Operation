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
                <h4 class="">Add Task</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('manager/add-task')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="task_name">TaskName</label>
                        <input type="text" name="task_name" id="task_name" class="form-control" placeholder="Task Name">
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="description">TaskDescription</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Task Description">
                    </div>
                    <br>
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
                        <button type="submit" class="btn btn-primary">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
