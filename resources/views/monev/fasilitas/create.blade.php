@extends('layouts.user')

@section('title')
Fasilitas
@endsection

{{-- @section('style-button-upload')
<style>
input[type="file"] {
    display: none;
}

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style> --}}
{{-- @endsection --}}

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        <p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::get('message')}}
                        </p>
                        {{Session::put('message', null)}}
                    </div>
                    @endif

                     @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <h4 class="card-title">Input Data Relawan</h4>
                    {{-- <p class="card-description"> Basic form elements </p> --}}
                    <form class="forms-sample" action="{{ route('store-fasilitas')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="">Jumlah PC/Komputer</label>
                            <input type="number" class="form-control" id=""
                                placeholder="Jumlah PC/Komputer" name="jumlah_pc" required>
                            <p class="text-danger">{{ $errors->first('jumlah_pc') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah Smartphone</label>
                            <input type="number" class="form-control" id=""
                                placeholder="Jumlah Smartphone" name="jumlah_hp" required>
                            <p class="text-danger">{{ $errors->first('jumlah_hp') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah Wifi</label>
                            <input type="number" class="form-control" id="" placeholder="Jumlah Wifi"
                                name="jumlah_wifi" required>
                            <p class="text-danger">{{ $errors->first('jumlah_wifi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah Berita Yang Dipublish</label>
                            <input type="number" class="form-control" id=""
                                placeholder="Jumlah Berita Publish" name="jumlah_berita" required>
                            <p class="text-danger">{{ $errors->first('jumlah_berita') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Bukti Berita Kegiatan</label>
                            <input type="file" class="form-control form-control-lg" id=""
                                placeholder="" name="bukti_berita">
                            <p class="text-danger">{{ $errors->first('bukti_berita') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Bukti Foto Penggunaan Smartphone</label>
                            <input type="file" class="form-control form-control-lg" id=""
                                placeholder="" name="foto_smartphone" required>
                            <p class="text-danger">{{ $errors->first('foto_smartphone') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Bukti Adanya Wifi Yang Digunakan</label>
                            <input type="file" class="form-control form-control-lg" id=""
                                placeholder="" name="foto_wifi" required>
                            <p class="text-danger">{{ $errors->first('foto_wifi') }}</p>
                        </div>
                         
                        <div class="form-group">
                            <label for="">Bukti Foto Komputer Yang Digunakan</label>
                            <input type="file" class="form-control form-control-lg" id=""
                                placeholder="" name="foto_komputer" required>
                            <p class="text-danger">{{ $errors->first('foto_komputer') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Bukti Pendidikan Jarak Jauh</label>
                            <input type="file" class="form-control form-control-lg" id=""
                                placeholder="" name="bukti_pjj" required>
                            <p class="text-danger">{{ $errors->first('bukti_pjj') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Link Video GBB Yang Diupload Ke Youtube</label>
                            <input type="url" class="form-control" id="" name="link_youtube" placeholder="Link Video Youtube" required>
                            <p class="text-danger">{{ $errors->first('link_youtube') }}</p>
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