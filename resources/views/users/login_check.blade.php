@extends('layouts.app2')
@section('content')
@section('hero_title','Login OR Registration')

    <!-- Login and Registration Area  -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
     @endif
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 justify-content-between ">
            <!-- Login  -->
            <div class="col-lg-5">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Login your Account</h4>
                    <form action="{{url('user_login_confirm')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="email">E-mail: </label>
                                <input class="form-control" type="text" id="email" name="email" placeholder="example@email.com" value="{{old('email')}}">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password">Password: </label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="******">
                            </div>
                            <div class="col-md-6 form-group">
                                <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Registration  -->
            <div class="col-lg-5">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">New User Registration</h4>
                     <form action="{{url('user_registration')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Full Name</label>
                                <input class="form-control" type="text" id="name" name="name"  placeholder="Mahmudul Hasan" value="{{old('name')}}">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="regi_email">E-mail: </label>
                                <input class="form-control" type="text" id="regi_email" name="email" placeholder="example@email.com" value="{{old('email')}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="number">Mobile No</label>
                                <input class="form-control" type="text" id="number" name="number"  placeholder="+123 456 789" value="{{old('number')}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="regi_password">Password: </label>
                                <input class="form-control" type="password" id="regi_password" name="password" placeholder="****** ">
                            </div>
                            <div class="col-md-6 form-group">
                                <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold">Registration</button>
                            </div>

                        </div>
                     </form>
                </div>
            </div>

        </div>
    </div>
@stop
