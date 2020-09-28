@extends('layouts.admin')

@section('title')
Jenjang
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
                    <h4 class="card-title">Edit Jenjang</h4>
                    {{-- <p class="card-description"> </p> --}}
                    <form class="forms-sample" action="{{route('update-jenjang-relawan', $editJenjang->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="exampleInputName1">Jenjang</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="........"
                                name="nama" value="{{$editJenjang->nama}}">
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection