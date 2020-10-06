@extends('layouts.user')
@section('title')
Sanggar
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
                    <h4 class="card-title">Sanggar</h4>
                    {{-- <p class="card-description"> Basic form elements </p> --}}
                    <form class="forms-sample" action="{{route('store-sanggar-user')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="jumlah_anggota">Jumlah Anggota</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_anggota"
                                placeholder=".........." name="jumlah_anggota" required>
                            <p class="text-danger">{{ $errors->first('jumlah_anggota') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_sanggar">Jumlah Sanggar</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_sanggar"
                                placeholder=".........." name="jumlah_sanggar" required>
                            <p class="text-danger">{{ $errors->first('jumlah_sanggar') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_perprovinsi">Jumlah Perprovinsi</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_perprovinsi"
                                placeholder=".........." name="jumlah_perprovinsi" required>
                            <p class="text-danger">{{ $errors->first('jumlah_perprovinsi') }}</p>
                        </div>
                      

                        <div class="form-group">
                            <label for="zona_covid">Zona Covid</label>
                            <select class="form-control" id="zona_covid" name="zona_covid">
                                <option value="">Pilih Zona</option>
                                <option value="Merah">Merah</option>
                                <option value="Kuning">Kuning</option>
                                <option value="Hijau">Hijau</option>
                              </select>
                            <p class="text-danger">{{ $errors->first('zona_covid') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_pelajar">Jumlah Pelajar</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_pelajar"
                                placeholder=".........." name="jumlah_pelajar" required>
                            <p class="text-danger">{{ $errors->first('jumlah_pelajar') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_komputer">Jumlah Komputer</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_komputer"
                                placeholder=".........." name="jumlah_komputer" required>
                            <p class="text-danger">{{ $errors->first('jumlah_komputer') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_gadget">Jumlah Gadget</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_gadget"
                                placeholder=".........." name="jumlah_gadget" required>
                            <p class="text-danger">{{ $errors->first('jumlah_gadget') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_wifi">Jumlah Wifi</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_wifi"
                                placeholder=".........." name="jumlah_wifi" required>
                            <p class="text-danger">{{ $errors->first('jumlah_wifi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_berita">Jumlah berita</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_berita"
                                placeholder=".........." name="jumlah_berita" required>
                            <p class="text-danger">{{ $errors->first('jumlah_berita') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_link_youtube">Jumlah Link Youtube</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_link_youtube"
                                placeholder=".........." name="jumlah_link_youtube" required>
                            <p class="text-danger">{{ $errors->first('jumlah_link_youtube') }}</p>
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