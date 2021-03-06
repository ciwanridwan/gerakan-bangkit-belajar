@extends('layouts.admin')
@section('title')
About
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{Session::put('message', null)}}
                    @endif
                    <h4 class="card-title">Input About</h4>
                    {{-- <p class="card-description"> Basic form elements </p> --}}
                    <form class="forms-sample" action="{{route('update-about', $edit->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{$edit->judul}}">
                            <p class="text-danger">{{ $errors->first('judul') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <textarea class="form-control" id="isi" name="isi" id="" cols="30" rows="10">{{$edit->isi}}</textarea>
                            <p class="text-danger">{{ $errors->first('isi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control form-control-lg" id="gambar" placeholder="Gambar"
                                name="gambar" value="{{$edit->gambar}}">
                            <p class="text-danger">{{ $errors->first('gambar') }}</p>
                        </div>

                        <input type="hidden" name="user_id" value="">
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#province_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){
    
                    $('#city_id').empty()
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })
    
        $('#city_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/district') }}",
                type: "GET",
                data: { city_id: $(this).val() },
                success: function(html){
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                    $.each(html.data, function(key, item) {
                        $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })
</script>
@endsection