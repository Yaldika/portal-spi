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
                            <div class="card-title">Data Iklan</div>
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
                                        <th>Judul Iklan</th>
                                        <th>link</th>
                                        <th>Status</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($iklan as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->judul_iklan }}</td>
                                            <td>{{ $row->link }}</td>
                                            <td>
                                                @if ($row->status == '1')
                                                    Active
                                                @else
                                                    Draft
                                                @endif
                                            </td>
                                            <td>
                                                <img src=" {{ asset('storage/' . $row->gambar_iklan) }} " width="100">
                                            </td>
                                            <td>
                                                <a href="{{ route('iklan.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>

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
