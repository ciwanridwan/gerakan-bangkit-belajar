@extends('layouts.admin')
@section('title')
Edit Relawan
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
          <h4 class="card-title">Edit Data Relawan</h4>
          {{-- <p class="card-description"> Basic form elements </p> --}}
          <form class="forms-sample" action="{{route('update-data-relawan', $editRelawan->id)}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="jenjang_id">Jenjang Relawan</label>
              <select class="form-control" id="jenjang_id" name="jenjang_id">
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
              <label for="kelurahan">Kelurahan / Desa</label>
              <input type="text" class="form-control" id="kelurahan" placeholder="Kelurahan / Desa" name="kelurahan">
              <p class="text-danger">{{ $errors->first('kelurahan') }}</p>
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

            @if ($editRelawan->follow_ig == 'Sudah')
            <div class="form-group">
              <label class="col-sm-3 col-form-label">Sudah Follow Akun Instagram?</label>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="follow_ig" id="optionsRadios1" value="Sudah" checked> Sudah
                </label>
              </div>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="follow_ig" id="optionsRadios2" value="Belum"> Belum
                </label>
              </div>
              <p class="text-danger">{{ $errors->first('follow_ig') }}</p>
            </div>    
            @else
            <div class="form-group">
              <label class="col-sm-3 col-form-label">Sudah Follow Akun Instagram?</label>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="follow_ig" id="optionsRadios1" value="Sudah"> Sudah
                </label>
              </div>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="follow_ig" id="optionsRadios2" value="Belum" checked> Belum
                </label>
              </div>
              <p class="text-danger">{{ $errors->first('follow_ig') }}</p>
            </div>   
            @endif
            
            @if ($editRelawan->subscribe_youtube == 'Sudah')
            <div class="form-group">
              <label class="col-sm-3 col-form-label">Sudah Subscribe Youtube?</label>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="subscribe_youtube" id="optionsRadios1"
                    value="Sudah" checked> Sudah </label>
              </div>
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="subscribe_youtube" id="optionsRadios2"
                    value="Belum"> Belum </label>
              </div>
              <p class="text-danger">{{ $errors->first('subscribe_youtube') }}</p>
            </div>
            @else
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
                    value="Belum" checked> Belum </label>
              </div>
              <p class="text-danger">{{ $errors->first('subscribe_youtube') }}</p>
            </div>
            @endif
           

            <div class="form-group">
              <label for="nama_aktivis">Nama Aktivis</label>
              <input type="text" class="form-control" id="nama_aktivis" placeholder="Nama Aktivis" name="nama_aktivis" value="{{$editRelawan->nama_aktivis}}">
              <p class="text-danger">{{ $errors->first('nama_aktivis') }}</p>
            </div>

            <div class="form-group">
              <label for="nama_teknisi">Nama Teknisi</label>
              <input type="text" class="form-control" id="nama_teknisi" placeholder="Nama Teknisi" name="nama_teknisi" value="{{$editRelawan->nama_teknisi}}"
                >
              <p class="text-danger">{{ $errors->first('nama_teknisi') }}</p>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$editRelawan->email}}">
              <p class="text-danger">{{ $errors->first('email') }}</p>
            </div>

            <div class="form-group">
              <label for="instagram">Instagram</label>
              <input type="text" class="form-control" id="instagram" placeholder="Instagram" name="instagram" value="{{$editRelawan->instagram}}">
              <p class="text-danger">{{ $errors->first('instagram') }}</p>
            </div>

            <div class="form-group">
              <label for="nomor_hp">Nomor HP</label>
              <input type="number" class="form-control" id="nomor_hp" placeholder="Nomor Handphone" name="nomor_hp" value="{{$editRelawan->nomor_hp}}"
                >
              <p class="text-danger">{{ $errors->first('nomor_hp') }}</p>
            </div>

            <button type="submit" class="btn btn-success mr-2">Submit</button>
          </form>
          <button class="btn btn-light" onclick="goBack()">Cancel</button>
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