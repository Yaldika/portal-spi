@extends('layouts.default')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">

        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Playlist Video {{ $playlist->judul_playlist }}</div>
                            <a href="{{ route('playlist.index') }}" class="btn  btn-warning btn-sm ml-auto">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('playlist.update', $playlist->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Playlist Video</label>
                                <input type="text" name="judul_playlist" value="{{ $playlist->judul_playlist }}" class="form-control"
                                    placeholder="Enter Judul">
                            </div>
                            <div class="form-group">
                                <label for="body">Deskripsi</label>
                                <textarea name="deskripsi" id="editor1" class="form-control">{{ $playlist->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" {{ $playlist->is_active == '1' ? 'selected' : '' }}>Publish
                                    </option>
                                    <option value="0" {{ $playlist->is_active == '0' ? 'selected' : '' }}>Draft
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Playlist</label>
                                <input type="file" name="gambar_playlist" class="form-control">
                                <label for="gambar">Gambar saat ini</label><br>
                                <img src=" {{ asset('storage/' . $playlist->gambar_playlist ) }} " width="100">
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                <button class="btn btn-danger btn-sm" type="submit">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
