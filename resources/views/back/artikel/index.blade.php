@extends('layouts.default')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">

        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Data Berita</div>
                            <a href="{{ route('artikel.create') }}" class="btn  btn-primary btn-sm ml-auto"><i
                                    class="fas fa-plus"></i> Tambah
                                    Berita</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-primary">
                                {{ Session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Berita</th>
                                        <th>Slug</th>
                                        <th>Kategori</th>
                                        <th>Author</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($artikel as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->judul }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td>{{ $row->kategori ? $row->kategori->nama_kategori : 'Tidak ada kategori' }}
                                            </td>
                                            <td>{{ $row->users ? $row->users->name : 'Tidak ada pengguna' }}</td>
                                            <td>
                                            <img src=" {{ asset('storage/' . $row->gambar_artikel ) }} " width="100"></td>
                                            <td>
                                                
                                                <a href="{{ route('artikel.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <form action="{{ route('artikel.destroy', $row->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Masih Kosong</td>
                                    </tr>
                                    @endforelse
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
