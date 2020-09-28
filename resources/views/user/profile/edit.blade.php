@extends('layouts.user')
@section('title')
    Edit Profile
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Profile</h4>
                    <form class="form-sample">
                        <p class="card-description"> Personal info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{Auth::user()->name}}" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" value="{{Auth::user()->email}}" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" value="" placeholder="***********">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Daftar Buat Akun</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="{{Auth::user()->created_at}}" placeholder=""  readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Category1</option>
                                            <option>Category2</option>
                                            <option>Category3</option>
                                            <option>Category4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Membership</label>
                                    <div class="col-sm-4">
                                        <div class="form-radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="membershipRadios"
                                                    id="membershipRadios1" value="" checked> Free </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="membershipRadios"
                                                    id="membershipRadios2" value="option2"> Professional </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <p class="card-description"> Address </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 1</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Postcode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>America</option>
                                            <option>Italy</option>
                                            <option>Russia</option>
                                            <option>Britain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <button class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection