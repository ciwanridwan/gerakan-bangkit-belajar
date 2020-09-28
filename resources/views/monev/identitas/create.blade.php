@extends('layouts.user')

@section('title')
Identitas Relawan
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
                    <form class="forms-sample" action="{{ route('store-identitas')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="">Nama Teknisi</label>
                            <input type="text" class="form-control" id="" placeholder="Nama Teknisi" name="nama_teknisi"
                                required>
                            <p class="text-danger">{{ $errors->first('nama_teknisi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Nomor Teknisi</label>
                            <input type="number" class="form-control" id="" placeholder="Nomor Teknisi"
                                name="nomor_teknisi" required>
                            <p class="text-danger">{{ $errors->first('nomor_teknisi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Email Teknisi</label>
                            <input type="email" class="form-control" id="" placeholder="Email Teknisi"
                                name="email_teknisi" required>
                            <p class="text-danger">{{ $errors->first('email_teknisi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Teknisi</label>
                            <select class="form-control" id="" name="jenis_teknisi" required>
                                <option value="">Pilih Jenis</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Pemuda">Pemuda</option>
                                <option value="Masyarakat">Masyarakat Umum</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('jenis_teknisi') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Aktivis</label>
                            <input type="text" class="form-control form-control-lg" id="" placeholder="Nama Aktivis"
                                name="nama_aktivis" required>
                            <p class="text-danger">{{ $errors->first('nama_aktivis') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Nomor Aktivis</label>
                            <input type="number" class="form-control form-control-lg" id="" placeholder="Nomor Aktivis"
                                name="nomor_aktivis" required>
                            <p class="text-danger">{{ $errors->first('nomor_aktivis') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Email Aktivis</label>
                            <input type="email" class="form-control form-control-lg" id="" placeholder="Email Aktivis"
                                name="email_aktivis" required>
                            <p class="text-danger">{{ $errors->first('email_aktivis') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Aktivis</label>
                            <select class="form-control" id="" name="jenis_aktivis" required>
                                <option value="">Pilih Jenis</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Pemuda">Pemuda</option>
                                <option value="Masyarakat">Masyarakat Umum</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('jenis_aktivis') }}</p>
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