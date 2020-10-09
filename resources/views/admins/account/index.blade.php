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
                    <h4 class="card-title">Akun User</h4>
                    <a href="{{route('create-account-relawan')}}" class="btn btn-success mr-2">Tambah</a>
                    {{-- <p class="card-description"> Add class <code>.table</code> </p> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @forelse ($user as $item)
                            <tr>
                                <td>{{$nomor}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td> <a href="{{route('edit-account-relawan', $item->id)}}" class="btn btn-info"> Edit </a>
                                </td>
                                <td>
                                    <form action="{{route('delete-account-relawan', $item->id)}}" method="POST">
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
                    {{$user->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection