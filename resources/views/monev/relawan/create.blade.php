@extends('layouts.user')
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
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
                </p>
              </div>
              {{Session::put('message', null)}}
          @endif
          <h4 class="card-title">Input Data Relawan</h4>
          {{-- <p class="card-description"> Basic form elements </p> --}}
          <form class="forms-sample" action="{{route('store-relawan')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="jenjang_id">Jenjang Relawan</label>
              <select class="form-control" id="jenjang_id" name="jenjang_id" required>
                <option value="">Pilih Jenjang</option>
                @foreach ($jenjang as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
              </select>
              <p class="text-danger">{{ $errors->first('jenjang_id') }}</p>
            </div>
            
            <div class="form-group">
              <label for="province_id">Provinsi</label>
              <select class="form-control" id="province_id" name="province_id">
                <option value="">Pilih Provinsi</option>
                @foreach ($provinces as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
              <p class="text-danger">{{ $errors->first('province_id') }}</p>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Kota</label>
              <select class="form-control" id="city_id" name="city_id">
                <option value="">Pilih Kabupaten/Kota</option>
              </select>
              <p class="text-danger">{{ $errors->first('city_id') }}</p>
            </div>

            <div class="form-group">
              <label for="district_id">Kecamatan</label>
              <select class="form-control" id="district_id" name="district_id">
                <option value="">Pilih Kecamatan</option>
              </select>
              <p class="text-danger">{{ $errors->first('district_id') }}</p>
            </div>

            <div class="form-group">
              <label for="village_id">Kelurahan / Desa</label>
              <select class="form-control" id="village_id" name="village_id">
                <option value="">Pilih Kelurahan/Desa</option>
              </select>
                <p class="text-danger">{{ $errors->first('village_id') }}</p>
            </div>

            <div class="form-group">
              <label for="anggota_id">Nama Anggota</label>
              <select class="form-control" id="anggota_id" name="anggota_id">
                <option value="">Pilih Anggota</option>
                @foreach ($anggota as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
              </select>
              <p class="text-danger">{{ $errors->first('anggota_id') }}</p>
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
              <label for="nama_aktivis">Nama Aktivis</label>
              <input type="text" class="form-control" id="nama_aktivis" placeholder="Nama Aktivis"
                name="nama_aktivis" required>
                <p class="text-danger">{{ $errors->first('nama_aktivis') }}</p>
            </div>

            <div class="form-group">
              <label for="nama_teknisi">Nama Teknisi</label>
              <input type="text" class="form-control" id="nama_teknisi" placeholder="Nama Teknisi"
                name="nama_teknisi" required>
                <p class="text-danger">{{ $errors->first('nama_teknisi') }}</p>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email"
                name="email" required>
                <p class="text-danger">{{ $errors->first('email') }}</p>
            </div>

            <div class="form-group">
              <label for="instagram">Instagram</label>
              <input type="text" class="form-control" id="instagram" placeholder="Instagram"
                name="instagram" required>
                <p class="text-danger">{{ $errors->first('instagram') }}</p>
            </div>

            <div class="form-group">
              <label for="nomor_hp">Nomor HP</label>
              <input type="number" class="form-control" id="nomor_hp" placeholder="Nomor Handphone"
                name="nomor_hp" required>
                <p class="text-danger">{{ $errors->first('nomor_hp') }}</p>
            </div>

            <button type="submit" class="btn btn-success mr-2">Submit</button>
          </form>
          <button class="btn btn-light">Cancel</button>
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

        $('#district_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/village') }}",
                type: "GET",
                data: { district_id: $(this).val() },
                success: function(html){
                    $('#village_id').empty()
                    $('#village_id').append('<option value="">Pilih Kelurahan / Desa</option>')
                    $.each(html.data, function(key, item) {
                        $('#village_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })
</script>
@endsection