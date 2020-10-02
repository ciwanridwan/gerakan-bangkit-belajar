@extends('layouts.user')

@section('title')
Berita
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
                    <h4 class="card-title">Berita</h4>
                    <a href="{{route('create-berita')}}" class="btn btn-success mr-2">Tambah</a>
                    {{-- <p class="card-description"> Add class <code>.table</code> </p> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                {{-- <th>Seo Judul</th> --}}
                                <th>Penulis</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @forelse ($berita as $item)
                            <tr>
                                <td>{{$nomor}}</td>
                                <td>{{$item->judul}}</td>
                                {{-- <td>{{$item->seo_judul}}</td> --}}
                                <td>{{$item->penulis}}</td>
                                <td><img src="{{ asset('storage/gambars/' . $item->gambar) }}" alt="{{$item->judul}}"></td>
                                @if ($item->status == 0)
                                <td><label class="badge badge-danger">Pending</label></td>
                                @elseif ($item->status == 1)
                                <td>
                                    <label class="badge badge-success">Published</label>
                                </td>
                                @endif
                                <td><a href="{{route('edit-berita', $item->id)}}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="{{route('delete-berita', $item->id)}}" method="POST">
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
                    {{$berita->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection