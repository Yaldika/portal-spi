@extends('front.layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mt-4">
                <div class="div">
                    <img src="{{ asset('storage/' . $artikel->gambar_artikel) }}" class="img-fluid">
                </div>
                <div class="detail-content mt-2 p-4">
                    
                    <div class="detail-badge">
                        <a href="" class="badge badge-warning">{{ $artikel->kategori->nama_kategori }}</a>
                        <a href="" class="badge badge-primary">{{ $artikel->users->name }}</a>
                    </div>
                    <h2>{{ $artikel->judul }}</h2>
                    <div class="detail-body">
                        <p>
                            {!! $artikel->body !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4">
                <div class="detail-sidebar-iklan">
                    <h4>Iklan</h4>
                    <a href="">
                        <img src="{{ asset('storage/assets/materi/foto.jpg') }}" alt="Banner Ad" width="500"
                            height="250">
                    </a>
                </div>

                <div class="detail-sidebar-kategori">
                    <h4 class="mt-4">Iklan</h4>
                    <hr>
                    <div class="sidebar-kategori d-flex flex-wrap">
                        <a href="" style="text decoration: none">
                            <p>Nama Kategori</p>
                        </a>
                        <p class="ml-auto text-right"><span class="bagde badge-dark">Jumlah</span></p>
                    </div>

                    <div class="sidebar-kategori d-flex flex-wrap">
                        <a href="" style="text decoration: none">
                            <p>Nama Kategori</p>
                        </a>
                        <p class="ml-auto text-right"><span class="bagde badge-dark">Jumlah</span></p>
                    </div>

                    <div class="detail-sidebar-artikel">
                        <h4 class="mt-4">Berita Terbaru</h4>
                        <hr>
                        <div class="media mt-3">
                            <img src="{{ asset('storage/assets/materi/foto.jpg') }} " width="64px" class="mr-3"
                                alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">Media heading</h5>
                            </div>
                        </div>
                        <div class="media mt-3">
                            <img src="{{ asset('storage/assets/materi/foto.jpg') }} " width="64px" class="mr-3"
                                alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">Media heading</h5>
                            </div>
                        </div>
                        <div class="media mt-3">
                            <img src="{{ asset('storage/assets/materi/foto.jpg') }} " width="64px" class="mr-3"
                                alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">Media heading</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
