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
          <h4 class="card-title">Input Data Relawan</h4>
          {{-- <p class="card-description"> Basic form elements </p> --}}
          <form class="forms-sample" action="{{route('store-relawan')}}" method="POST">
            @csrf
            @method('POST')
            

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

            <div class="form-group">
              <label for="exampleFormControlSelect2">Kota</label>
              <select class="form-control" id="city_id" name="city_id" required>
                <option value="">Pilih Kabupaten/Kota</option>
              </select>
              <p class="text-danger">{{ $errors->first('city_id') }}</p>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Kecamatan</label>
              <select class="form-control" id="district_id" name="district_id" required>
                <option value="">Pilih Kecamatan</option>
              </select>
              <p class="text-danger">{{ $errors->first('district_id') }}</p>
            </div>

            <div class="form-group">
              <label for="nama">Nama DPR</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama Relawan" name="nama" required>
              <p class="text-danger">{{ $errors->first('nama') }}</p>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-form-label">Sudah Follow Akun Instagram?</label>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="follow_ig" id="optionsRadios1" value="Sudah"> Sudah
                </label>
              </div>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="follow_ig" id="optionsRadios2" value="Belum"> Belum
                </label>
              </div>
              <p class="text-danger">{{ $errors->first('follow_ig') }}</p>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-form-label">Sudah Subscribe Youtube?</label>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="subscribe_youtube" id="optionsRadios1"
                    value="Sudah"> Sudah </label>
              </div>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="subscribe_youtube" id="optionsRadios2"
                    value="Belum"> Belum </label>
              </div>
              <p class="text-danger">{{ $errors->first('subscribe_youtube') }}</p>
            </div>

            

           

            

            <div class="form-group">
              <label for="exampleInputEmail3">Kelurahan / Desa</label>
              <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Kelurahan / Desa"
                name="kelurahan" required>
                <p class="text-danger">{{ $errors->first('kelurahan') }}</p>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail3">Jumlah Sanggar</label>
              <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Jumlah Sanggar"
                name="jumlah_sanggar" required>
                <p class="text-danger">{{ $errors->first('jumlah_sanggar') }}</p>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail3">Jumlah Pelajar</label>
              <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Jumlah Pelajar"
                name="jumlah_pelajar" required>
                <p class="text-danger">{{ $errors->first('jumlah_pelajar') }}</p>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Zona Covid</label>
              <select class="form-control" id="exampleFormControlSelect2" name="zona_covid" required>
                <option value="">Pilih Zona</option>
                <option value="Merah">Merah</option>
                <option value="Kuning">Kuning</option>
                <option value="Hijau">Hijau</option>
              </select>
              <p class="text-danger">{{ $errors->first('zona_covid') }}</p>
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