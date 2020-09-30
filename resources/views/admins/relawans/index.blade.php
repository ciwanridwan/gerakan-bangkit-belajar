@extends('layouts.admin')

@section('title')
Data Relawan
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Relawan</h4>
                    <a href="{{route('create-data-relawan')}}" class="btn btn-success mr-2">Tambah</a>
                    {{-- <p class="card-description"> Add class <code>.table</code> </p> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenjang</th>
                                <th>Kode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @forelse ($relawan as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->jenjang}}</td>
                                @if ($item->jenjang == 'DPR RI')
                                <td>0</td>
                                @elseif ($item->jenjang == 'DPRD PROVINSI')
                                <td>{{$item->province_id}}</td>
                                @else
                                <td>{{$item->city_id}}</td>
                                @endif
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