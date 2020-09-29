@extends('layouts.admin')
@section('title')
    Relawan
@endsection

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          @if (Session::has('message'))
              <div class="alert alert-success">
                <p>
                {{Session::get('message')}}
                </p>
                {{Session::put('message', null)}}
              </div>
          @endif
          <h4 class="card-title">Input Data Anggota DPR RI</h4>
          {{-- <p class="card-description"> Basic form elements </p> --}}
          <form class="forms-sample" action="{{route('store-relawan')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="nama">Nama DPR</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama Relawan" name="nama" required>
              <p class="text-danger">{{ $errors->first('nama') }}</p>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Jenjang Relawan</label>
              <select class="form-control" id="exampleFormControlSelect2" name="jenjang" required>
                <option value="">Pilih Jenjang</option>
                @foreach ($jenjang as $item)
                <option value="{{$item->nama}}">{{$item->nama}}</option>
                @endforeach
              </select>
              <p class="text-danger">{{ $errors->first('jenjang') }}</p>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Provinsi</label>
              <select class="form-control" id="province_id" name="province_id" required>
                <option value="">Pilih Provinsi</option>
                @foreach ($provinces as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
              <p class="text-danger">{{ $errors->first('province_id') }}</p>
            </div>
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