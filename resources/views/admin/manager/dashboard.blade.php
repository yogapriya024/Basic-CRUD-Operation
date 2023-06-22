@extends('layouts.manager')
@section('title','Manager Dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manager Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manager Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Manager</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Manager : {{$manager}}
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">User</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total User : {{$user}}
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
