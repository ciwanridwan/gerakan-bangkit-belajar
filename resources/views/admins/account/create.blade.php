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
                    <h4 class="card-title">Tambah Akun</h4>
                    {{-- <p class="card-description"> </p> --}}
                    <form class="forms-sample" action="{{route('store-account-relawan')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputName1" placeholder="........" name="name" required autocomplete="name"
                                autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="........" name="email" required autocomplete="email"
                                autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" placeholder="........" name="password" required autocomplete="password"
                                autofocus>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" class="form-control"
                                id="password_confirmation" placeholder="........" name="password_confirmation" required autocomplete="password_confirmation"
                                autofocus>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                    </form>
                    <button class="btn btn-light" onclick="goBack()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection