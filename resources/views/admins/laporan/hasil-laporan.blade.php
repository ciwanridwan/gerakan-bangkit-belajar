@extends('layouts.admin')

@section('title')
Data Anggota Dewan
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
					{{-- <img src="{{ asset('assets/img/logo-gbb.jpeg')}}" alt="gerakan-bangkit-belajar" style="width: 75px; height: auto;"> --}}
                    <center><h4 class="card-title">LAPORAN DATA SANGGAR<br />GERAKAN BANGKIT BELAJAR<br />SE - INDONESIA</h4>
					<h6>Tanggal {{$day}}-{{ $bulan }}-{{ $tahun }}</center></h6><hr />
                    <table width="100%" border="0">
						<tr>
							<td width="30%" valign="top">Jumlah Anggota</td>
							<td width="2%" valign="top">:</td>
							<td width="68%">								
								<ul>
									<li>DPR RI (<?= $anggota_dprri; ?>)</li>
									<li>DPRD Provinsi (<?= $anggota_dprprov; ?>)</li>
									<li>DPRD Kab./Kota (<?= $anggota_dprkab; ?>)</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td valign="top">Jumlah Sanggar</td>
							<td valign="top">:</td>
							<td>								
								<ul>
									<li>DPR RI (<?= $sanggar_dprri; ?>)</li>
									<li>DPRD Provinsi (<?= $sanggar_dprprov; ?>)</li>
									<li>DPRD Kab./Kota (<?= $sanggar_dprkab; ?>)</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td valign="top">Jumlah Perprovinsi</td>
							<td valign="top">:</td>
							<td>								
								<ul>
									@foreach ($provinsi as $prov)
									<?php
										$hitung = count(DB::table('monevs')->select('monevs.id')->leftJoin('relawans', 'monevs.relawan_id', '=', 'relawans.id')->where('relawans.province_id', '=', $prov->id)->get());
									?>
									<li>{{$prov->name}} ({{$hitung}})</li>
									@endforeach
								</ul>
							</td>
						</tr>
						<tr>
							<td>Zona Covid</td>
							<td>:</td>
							<td>								
								<ul>
									<li>Merah (<?= $zona_merah; ?>)</li>
									<li>Kuning (<?= $zona_kuning; ?>)</li>
									<li>Hijau (<?= $zona_hijau; ?>)</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td valign="top">Jumlah Pelajar</td>
							<td valign="top">:</td>
							<td>
								<ul>
									<li>PAUD/TK(<?= $jumlah_paud; ?>)</li>
									<li>SD/MI(<?= $jumlah_sd; ?>)</li>
									<li>SMP/MTs(<?= $jumlah_smp; ?>)</li>
									<li>SMK/SMA/MA(<?= $jumlah_sma; ?>)</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>Jumlah Komputer</td>
							<td>:</td>
							<td><?= $jumlah_komputer; ?></td>
						</tr>
						<tr>
							<td>Jumlah Gadget</td>
							<td>:</td>
							<td><?= $jumlah_gadget; ?></td>
						</tr>
						<tr>
							<td>Jumlah Wifi</td>
							<td>:</td>
							<td><?= $jumlah_wifi; ?></td>
						</tr>
						<tr>
							<td>Jumlah Berita</td>
							<td>:</td>
							<td><?= $jumlah_berita; ?></td>
						</tr>
						<tr>
							<td>Jumlah Link Youtube</td>
							<td>:</td>
							<td><?= $jumlah_link_youtube; ?></td>
						</tr>
					</table>
                </div>
				<div class="card-footer">
					<a target="_blank" href="{{ route('cetak-laporan-admin', $bulanTahun) }}" class="btn btn-success mr-2">Cetak</a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection