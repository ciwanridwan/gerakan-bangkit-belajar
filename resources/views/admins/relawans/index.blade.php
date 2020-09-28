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
                    {{-- <p class="card-description"> Add class <code>.table</code> </p> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenjang</th>
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