<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Laporan Data Sanggar Oleh Team</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		.normal {
            font-style: normal;
            font-weight: normal;
        }
	</style>
</head>
<body>
	
        <h5 style="text-align: center;">Laporan Data Sanggar Oleh Team</h5>
        <h5 style="text-align: center;">Gerakan Bangkit Belajar</h5>
        <h5 style="text-align: center;">{{$tanggal}}</h5>
        <br>

        @foreach ($relawan as $rel)
            @if ($monev->relawan_id == $rel->id)
                @foreach ($jenjang as $jen)
                    @if ($jen->id == $rel->jenjang_id)
                    <h6 class="normal">Jenjang : {{$jen->nama}}</h6>                    
                    @endif
                @endforeach
            @endif
        @endforeach

        @foreach ($relawan as $p)
            @if ($monev->relawan_id == $p->id)
            @foreach ($anggota as $a)
                @if ($p->anggota_id == $a->id)
                <h6 class="normal">Nama DPR : {{$a->nama}} </h6>                
                @endif
            @endforeach 
            @endif
        @endforeach

    <h6 class="normal">Alamat   : </h6>
    <h6 class="normal">Zona Covid : {{$monev->zona_covid}}</h6>
    <h6 class="normal">Nama Tim : <br> 1. (....) <br> 2. (......)</h6>
    <h6 class="normal">Jumlah Pelajar : <br> TK/PAUD ({{$monev->jumlah_paud}}) <br> - SD ({{$monev->jumlah_sd}}) <br> - SMP ({{$monev->jumlah_smp}}) <br> - SMA ({{$monev->jumlah_sma}})</h6>
    <h6 class="normal">Jumlah Komputer : {{$monev->jumlah_komputer}}</h6>
    <h6 class="normal">Jumlah Gadget : {{$monev->jumlah_gadget}}</h6>
    <h6 class="normal">Jumlah Wifi : {{$monev->jumlah_wifi}}</h6>
    <h6 class="normal">Jumlah Berita : {{$monev->jumlah_berita}}</h6>
    <h6 class="normal">Jumlah Link Youtube : {{$monev->jumlah_link_youtube}}</h6>
    @foreach ($relawan as $k)
    @if ($monev->relawan_id == $k->id)
    <h6 class="normal">Email : {{$k->email}} </h6>
    <h6 class="normal">Instagram : {{$k->instagram}}</h6>
    <h6 class="normal">Nomor HP : {{$k->nomor_hp}}</h6>    
    @endif
    @endforeach


    
 
</body>
</html>