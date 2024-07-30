@extends('front.layouts.frontend')
@include('front.includes.slide')
@section('content')
    <div class="row">
        @forelse ($artikel as $row)
            <div class="col-md-4 mt-3">
                <div class="card" style="background-color: #87CEEB;">
                    <img src="{{ asset('storage/' . $row->gambar_artikel) }}" class="card-img-top"
                        alt="..." style="width: 300px; height: 150px;">
                    <div class="card-body" style="background-color: #ececec;">
                        <h5 class="card-title">
                            <a href=" {{ route('detail-artikel', $row->slug) }} " style="text-decoration: none">
                                {{ $row->judul }}
                                
                            </a>
                        </h5>
                        <p class="card-text">{{ $row->body }}</p>
                    </div>
                    {{-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul> --}}
                    {{-- <div class="card-body">
                        <a style="margin-right: 5px;">{{ $row->users->name }}</a>
                        <a style="margin-right: 5px;">{{ $row->kategori->nama_kategori }}</a>
                    </div> --}}
                    <div class="card-body">
                        @if($row->users)
                            <a style="margin-right: 5px;">{{ $row->users->name }}</a>
                        @else
                            <a style="margin-right: 5px;">Nama pengguna tidak tersedia</a>
                        @endif
                    
                        @if($row->kategori)
                            <a style="margin-right: 5px;">{{ $row->kategori->nama_kategori }}</a>
                        @else
                            <a style="margin-right: 5px;">Kategori tidak tersedia</a>
                        @endif
                    </div>
                    
                </div>
            </div>

        @empty
            <p>Belum ada data</p>
        @endforelse

    </div>
@endsection
