@extends('layouts.user')
@section('title','User Dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">User Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">User Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Task In-Progress</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$taskInProgress}} Task In-Progress
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Task Initiated</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$taskInitiated}} Task Initiated
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Task Completed</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$taskCompleted}} Task Completed
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Task In-Completed</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$taskInCompleted}} Task In Completed
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
