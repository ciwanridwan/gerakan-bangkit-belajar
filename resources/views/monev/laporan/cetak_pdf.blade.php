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
	
    <center><h4 class="card-title">LAPORAN DATA SANGGAR<br />GERAKAN BANGKIT BELAJAR</h4>
        <h6>Tanggal {{$day}}-{{ $bulan }}-{{ $tahun }}</center></h6><hr />
        <table width="100%" border="0">
            <tr>
                <td width="30%">Jenjang</td>
                <td width="2%">:</td>
                <td width="68%"><?= $laporan->nama_jenjang; ?></td>
            </tr>
            <tr>
                <td>Nama DPR</td>
                <td>:</td>
                <td><?= $laporan->nama_anggota; ?></td>
            </tr>
            <tr>
                <td valign="top">Alamat</td>
                <td valign="top">:</td>
                <td>
                    Desa/Kelurahan <?= $laporan->nama_desa; ?><br />
                    Kecamatan <?= $laporan->nama_kecamatan; ?><br />
                    Kabupaten/Kota <?= $laporan->nama_kabupaten; ?><br />
                    Provinsi <?= $laporan->nama_provinsi; ?><br />
                </td>
            </tr>
            <tr>
                <td>Zona Covid</td>
                <td>:</td>
                <td><?= $laporan->zona_covid; ?></td>
            </tr>
            <tr>
                <td valign="top">Nama Tim</td>
                <td valign="top">:</td>
                <td>
                    <ul>
                        <li><?= $laporan->nama_teknisi; ?></li>
                        <li><?= $laporan->nama_aktivis; ?></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td valign="top">Jumlah Pelajar</td>
                <td valign="top">:</td>
                <td>
                    <ul>
                        <li>PAUD/TK(<?= $laporan->jumlah_paud; ?>)</li>
                        <li>SD/MI(<?= $laporan->jumlah_sd; ?>)</li>
                        <li>SMP/MTs(<?= $laporan->jumlah_smp; ?>)</li>
                        <li>SMK/SMA/MA(<?= $laporan->jumlah_sma; ?>)</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Jumlah Komputer</td>
                <td>:</td>
                <td><?= $laporan->jumlah_komputer; ?></td>
            </tr>
            <tr>
                <td>Jumlah Gadget</td>
                <td>:</td>
                <td><?= $laporan->jumlah_gadget; ?></td>
            </tr>
            <tr>
                <td>Jumlah Wifi</td>
                <td>:</td>
                <td><?= $laporan->jumlah_wifi; ?></td>
            </tr>
            <tr>
                <td>Jumlah Berita</td>
                <td>:</td>
                <td><?= $laporan->jumlah_berita; ?></td>
            </tr>
            <tr>
                <td>Jumlah Link Youtube</td>
                <td>:</td>
                <td><?= $laporan->jumlah_link_youtube; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?= $laporan->email; ?></td>
            </tr>
            <tr>
                <td>Instagram</td>
                <td>:</td>
                <td><?= $laporan->instagram; ?></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td><?= $laporan->nomor_hp; ?></td>
            </tr>
        </table>


    
 
</body>
</html>