@extends('layouts.admin')

@section('title')
Akun
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>

                        {{Session::put('success', null)}}
                    </div>
                    @endif
                    <h4 class="card-title">Edit User</h4>
                    {{-- <p class="card-description"> </p> --}}
                    <form class="forms-sample" action="{{route('update-account-relawan', $akun->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="........" name="name"
                                value="{{$akun->name}}">
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="........" name="email"
                                value="{{$akun->email}}">
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                    </form>


                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>

                        {{Session::put('success', null)}}
                    </div>
                    @endif
                    <h4 class="card-title">Edit Password</h4>
                    <form class="forms-sample" action="{{route('update-password-account', $akun->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="........"
                                name="password" value="">
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                placeholder="........" name="password_confirmation" value="">
                            <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection