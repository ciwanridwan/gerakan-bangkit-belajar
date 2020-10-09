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
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                      <p>
                        {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </p>
                    </div>
                    {{Session::put('message', null)}}
                    @endif
                    <h4 class="card-title">Data Relawan</h4>
                    <a href="{{route('create-data-relawan')}}" class="btn btn-success mr-2">Tambah</a>
                    {{-- <p class="card-description"> Add class <code>.table</code> </p> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
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
                            @forelse ($relawan as $item)
                            <tr>
                                <td>{{$nomor}}</td>
                                @foreach ($anggota as $q)
                                @if ($item->anggota_id == $q->id)
                                 <td>{{$q->nama}}</td>     
                                @endif
                                @endforeach

                                @foreach ($jenjang as $p)
                                    @if ($item->jenjang_id == $p->id)
                                    <td>{{$p->nama}}</td>        
                                    @endif
                                @endforeach

                                @if ($item->jenjang_id == 1)
                                <td>-</td>
                                
                                @elseif ($item->jenjang_id == 2)
                                @foreach ($provinces as $p)

                                @if ($p->id == $item->province_id)
                                <td>{{$p->name}}</td>        
                                @endif

                                @endforeach
                                @else

                                @foreach ($city as $c)
                                @if ($item->city_id == $c->id)
                                <td>{{$c->name}}</td>    
                                @endif
                                    
                                @endforeach
                                @endif
                                <td><a href="{{route('edit-data-relawan', $item->id)}}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="{{route('delete-data-relawan', $item->id)}}" method="POST">
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
                    {{$relawan->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection