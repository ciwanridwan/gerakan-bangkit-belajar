@extends('layouts.user')

@section('title')
Laporan Team
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{Session::put('message', null)}}
                    @endif
                    <h4 class="card-title">Laporan</h4>
                    <a target="_blank" href="{{route('cetak-monev-team', auth()->user()->id)}}" class="btn btn-success mr-2">Download</a>

                    {{-- <p class="card-description"> Add class <code>.table</code> </p> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenjang</th>
                                <th>Nama DPR</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            {{-- @forelse ($jenjang as $item)
                            <tr>
                                <td>{{$nomor}}</td>
                                <td>{{$item->nama}}</td>
                                <td> <a href="{{route('edit-jenjang-relawan', $item->id)}}" class="btn btn-info"> Edit </a>
                                </td>
                                <td>
                                    <form action="{{route('delete-jenjang-relawan', $item->id)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                            $nomor = $nomor + 1;
                            @endphp
                            @empty
                            <tr>
                                <td colspan="3">Tidak Ada Data</td> --}}
                                {{-- <td>
                                    <label class="badge badge-danger">Pending</label>
                                </td> --}}
                            {{-- </tr>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection