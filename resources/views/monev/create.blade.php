@extends('layouts.user')
@section('title')
Monev
@endsection

@section('css-hide')
<style>
    #hidden_div {
        display: none;
    }
</style>

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
                    <h4 class="card-title">Monev</h4>
                    {{-- <p class="card-description"> Basic form elements </p> --}}
                    <form class="forms-sample" action="{{route('store-monev')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            {{-- <label for="user_id">Jenjang Relawan</label> --}}
                            <input type="hidden" class="form-control" id="user_id" placeholder="" name="user_id"
                                value="{{auth()->user()->id}}">
                            <p class="text-danger">{{ $errors->first('user_id') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jenjang_id">Jenjang Relawan</label>
                            {{-- <select class="form-control" id="jenjang_id" name="jenjang_id" required onchange="showDiv('hidden_div', this)"> --}}
                                <select name="jenjang_id" id="jenjang_id" class="form-control" required onchange="showDiv()">
                                <option value="">Pilih Jenjang</option>
                                @foreach ($jenjang as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            {{-- <div id="hidden_div">This is a hidden div</div> --}}
                            <p class="text-danger">{{ $errors->first('jenjang_id') }}</p>
                        </div>

                        <div class="form-group" id="province">
                            <label for="province_id">Provinsi</label>
                            <select class="form-control" id="province_id" name="province_id">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('province_id') }}</p>
                        </div>

                        <div class="form-group" id="city">
                            <label for="city_id">Kota</label>
                            <select class="form-control" id="city_id" name="city_id">
                                <option value="">Pilih Kabupaten/Kota</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('city_id') }}</p>
                        </div>

                        <div class="form-group" id="district">
                            <label for="district_id">Kecamatan</label>
                            <select class="form-control" id="district_id" name="district_id">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('district_id') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="anggota_id">Anggota Dewan</label>
                            <select class="form-control" id="anggota_id" name="anggota_id">
                                <option value="">Pilih Anggota</option>
                                @foreach ($anggota as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('anggota_id') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="foto_gadget">Foto Gadget</label>
                            <input type="file" class="form-control form-control-lg" id="foto_gadget"
                                placeholder="Nama Aktivis" name="foto_gadget" required>
                            <p class="text-danger">{{ $errors->first('foto_gadget') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="foto_komputer">Foto Komputer</label>
                            <input type="file" class="form-control form-control-lg" id="foto_komputer"
                                placeholder="Nama Aktivis" name="foto_komputer" required>
                            <p class="text-danger">{{ $errors->first('foto_komputer') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="foto_wifi">Foto Wifi</label>
                            <input type="file" class="form-control form-control-lg" id="foto_wifi"
                                placeholder="Nama Aktivis" name="foto_wifi" required>
                            <p class="text-danger">{{ $errors->first('foto_wifi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="zona_covid">Zona Covid</label>
                            <select class="form-control" id="zona_covid" name="zona_covid">
                                <option value="">Pilih Zona Covid</option>
                                <option value="Merah">Merah</option>
                                <option value="Kuning">Kuning</option>
                                <option value="Hijau">Hijau</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('zona_covid') }}</p>
                        </div>


                        <div class="form-group">
                            <label for="jumlah_paud">Jumlah Paud</label>
                            <input type="number" class="form-control" id="jumlah_paud" placeholder="Jumlah Paud"
                                name="jumlah_paud" required>
                            <p class="text-danger">{{ $errors->first('jumlah_paud') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_sd">Jumlah Sd</label>
                            <input type="number" class="form-control" id="jumlah_sd" placeholder="Jumlah Sd"
                                name="jumlah_sd" required>
                            <p class="text-danger">{{ $errors->first('jumlah_sd') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_smp">Jumlah Smp</label>
                            <input type="number" class="form-control" id="jumlah_smp" placeholder="Jumlah Smp"
                                name="jumlah_smp" required>
                            <p class="text-danger">{{ $errors->first('jumlah_smp') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_sma">Jumlah Sma</label>
                            <input type="number" class="form-control" id="jumlah_sma" placeholder="Jumlah Sma"
                                name="jumlah_sma" required>
                            <p class="text-danger">{{ $errors->first('jumlah_sma') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_komputer">Jumlah Komputer</label>
                            <input type="number" class="form-control" id="jumlah_komputer" placeholder="Jumlah Komputer"
                                name="jumlah_komputer" required>
                            <p class="text-danger">{{ $errors->first('jumlah_komputer') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_gadget">Jumlah Gadget</label>
                            <input type="number" class="form-control" id="jumlah_gadget" placeholder="Jumlah Gadget"
                                name="jumlah_gadget" required>
                            <p class="text-danger">{{ $errors->first('jumlah_gadget') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_wifi">Jumlah Wifi</label>
                            <input type="number" class="form-control" id="jumlah_wifi" placeholder="Jumlah Wifi"
                                name="jumlah_wifi" required>
                            <p class="text-danger">{{ $errors->first('jumlah_wifi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_berita">Jumlah Berita</label>
                            <input type="number" class="form-control" id="jumlah_berita" placeholder="Jumlah Berita"
                                name="jumlah_berita" required>
                            <p class="text-danger">{{ $errors->first('jumlah_berita') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_link_youtube">Jumlah Link Youtube</label>
                            <input type="number" class="form-control" id="jumlah_link_youtube"
                                placeholder="Jumlah Link Youtube" name="jumlah_link_youtube" required>
                            <p class="text-danger">{{ $errors->first('jumlah_link_youtube') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="berkas">File</label>
                            <input type="file" class="form-control form-control-lg" id="berkas" placeholder=""
                                name="berkas" required>
                            <p class="text-danger">{{ $errors->first('berkas') }}</p>
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
</script>
<script>
    // function showDiv(divId, element)
    // {
    //     document.getElementById(divId).style.display = element.value == 2 ? 'block' : 'none';
    // }
var province = document.getElementById('province');
province.style.display = 'none'; 

var city = document.getElementById('city');
city.style.display = 'none';

var district = document.getElementById('district');
district.style.display = 'none';

function showDiv() {
    selectedVal = document.getElementById('jenjang_id').value;
    if (selectedVal == '1') {
        $("#province").hide();
        $("#city").hide();
        $("#district").hide();
    }

    if (selectedVal == '2') {
        $("#province").show();
    }

    if (selectedVal == '3') {
        $("#province").show();
        $("#city").show();
        $("#district").show();
    }

}

</script>
@endsection