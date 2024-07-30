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
                            <div class="card-title">Form Playlist Video</div>
                            <a href="{{ route('playlist.index') }}" class="btn  btn-warning btn-sm ml-auto">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('playlist.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul Playlist</label>
                                <input type="text" name="judul_playlist" class="form-control"
                                    placeholder="Enter Judul">
                            </div>
                            <div class="form-group">
                                <label for="body">Deskripsi</label>
                                <textarea name="deskripsi" id="editor1" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Artikel</label>
                                <input type="file" name="gambar_playlist" class="form-control">
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
