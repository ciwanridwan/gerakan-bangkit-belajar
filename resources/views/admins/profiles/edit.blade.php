@extends('layouts.admin')
@section('title')
    Edit Profile
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        <p>
                            {{Session::get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>
                        
                        {{Session::put('message', null)}}
                    </div>
                    @endif
                    <h4 class="card-title">Edit Profile</h4>
                    <form class="form-sample" action="{{route('update-profile-admin', Auth::guard('admin')->user()->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <p class="card-description"> Personal info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{Auth::guard('admin')->user()->nama}}" class="form-control" name="nama" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" value="{{Auth::guard('admin')->user()->email}}" class="form-control" name="email" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" value="" placeholder="***********" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Daftar Buat Akun</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="{{Auth::guard('admin')->user()->created_at}}" placeholder=""  readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection