@extends('layouts.admin')

@section('title')
Data Anggota Dewan
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Anggota Dewan</h4>
                    <a href="{{route('create-anggota-dewan')}}" class="btn btn-success mr-2">Tambah</a>
                    {{-- <p class="card-description"> Add class <code>.table</code> </p> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jumlah Anggota</th>
                                <th>Jumlah Sanggar</th>
                                <th>Jumlah Perprovinsi</th>
                                <th>Zona Covid</th>
                                <th>Jumlah Pengajar</th>
                                <th>Jumlah Komputer</th>
                                <th>Jumlah Gadget</th>
                                <th>Jumlah Wifi</th>
                                <th>Jumlah Berita</th>
                                <th>Jumlah Link Youtube</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @forelse ($sanggar as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->jumlah_anggota}}</td>
                                <td>{{$item->jumlah_sanggar}}</td>
                                <td>{{$item->jumlah_perprovinsi}}</td>
                                <td>{{$item->zona_covid}}</td>
                                <td>{{$item->jumlah_pelajar}}</td>
                                <td>{{$item->jumlah_komputer}}</td>
                                <td>{{$item->jumlah_gadget}}</td>
                                <td>{{$item->jumlah_wifi}}</td>
                                <td>{{$item->jumlah_berita}}</td>
                                <td>{{$item->jumlah_link_youtbe}}</td>
                                <td><a href="{{route('edit-relawan', $item->id)}}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="{{route('delete-relawan', $item->id)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Tidak Ada Data</td>
                            </tr>
                            @endforelse
                            {{-- <td>
                                    <label class="badge badge-danger">Pending</label>
                                </td> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection