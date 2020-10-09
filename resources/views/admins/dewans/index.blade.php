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
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>

                        {{Session::put('success', null)}}
                    </div>
                    @endif
                    <h4 class="card-title">Data Anggota Dewan</h4>
                    <a href="{{route('create-anggota-dewan')}}" class="btn btn-success mr-2">Tambah</a>
                    {{-- <p class="card-description"> Add class <code>.table</code> </p> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenjang</th>
                                <th>Daerah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @forelse ($anggotaDewan as $item)
                            <tr>
                                <td>{{$nomor}}</td>
                                <td>{{$item->nama}}</td>

                                @foreach ($jenjang as $p)
                                @if ($p->id == $item->jenjang_id)
                                    <td>{{$p->nama}}</td>
                                @endif
                                @endforeach

                                @if ($item->jenjang_id == 2)
                                @foreach ($province as $provinsi)
                                    @if ($provinsi->id == $item->province_id)
                                    <td> {{$provinsi->name}}</td>        
                                    @endif    
                                @endforeach

                                @elseif ($item->jenjang_id == 3)
                                @foreach ($city as $cities)
                                    @if ($cities->id == $item->city_id)
                                    <td> {{$cities->name}}</td>        
                                    @endif    
                                @endforeach
                                
                                @else
                                <td>-</td>
                                @endif
                                <td><a href="{{route('edit-dewan', $item->id)}}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="{{route('delete-dewan', $item->id)}}" method="POST">
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
                                <td colspan="3">Tidak Ada Data</td>
                            </tr>
                            @endforelse
                            {{-- <td>
                                    <label class="badge badge-danger">Pending</label>
                                </td> --}}
                        </tbody>
                    </table>
                    {{$anggotaDewan->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection