@extends('layouts.user')
@section('title')
Monev
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
                            <label for="relawan_id">Relawan</label>
                            <select class="form-control" id="relawan_id" name="relawan_id">
                                <option value="">Pilih Relawan</option>
                                @foreach ($relawan as $item)
                                @foreach ($anggota as $p)
                                @if ($item->anggota_id == $p->id)
                                <option value="{{$item->id}}">{{$p->nama}}</option>
                                @endif
                                @endforeach
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('relawan_id') }}</p>
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
                            <input type="file" class="form-control form-control-lg" id="berkas"
                                placeholder="" name="berkas" required>
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
@endsection