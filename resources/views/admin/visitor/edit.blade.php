@extends('layouts.master')
@section('title','Visitor')
@section('content')
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Visitor</li>
        </ol>
        <div class="row">

        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="">Edit Visitor</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/update-visitor/'.$visitor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <label for="firstname">FirstName</label>
                            <input type="text" name="firstname" id="firstname" value="{{$visitor->contactInfo->firstname}}" class="form-control" placeholder="First name">
                        </div>

                        <div class="col">
                            <label for="lastname">LastName</label>
                            <input type="text" name="lastname" id="lastname" value="{{$visitor->contactInfo->lastname}}" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="{{$visitor->email}}" class="form-control" placeholder="Email">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" id="mobile" value="{{$visitor->contactInfo->mobile}}" class="form-control" placeholder="Mobile">
                        </div>
                        <div class="col">
                            <label for="address1">Address 1</label>
                            <input class="form-control" name="address1" value="{{$visitor->contactInfo->address1}}" id="address1" rows="3"></input>
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-sm-3">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" value="{{$visitor->contactInfo->city}}" class="form-control" placeholder="City">
                        </div>
                        <div class="col-sm-3">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" value="{{$visitor->contactInfo->state}}" class="form-control" placeholder="State">
                        </div>
                        <div class="col-sm-3">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" value="{{$visitor->contactInfo->country}}" class="form-control" placeholder="Country">
                        </div>
                        <div class="col-sm-3">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" name="zipcode" id="zipcode" value="{{$visitor->contactInfo->zipcode}}" class="form-control" placeholder="Zipcode">
                        </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Update Visitor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
