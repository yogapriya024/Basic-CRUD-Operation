@extends('layouts.user')
@section('title','View Task')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                Edit Task Status
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                    <form action="{{url('user/update-Usertask/'.$event->id)}}" method="POST">
                        @csrf
                        @method('PUT')
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
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
