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
                            <div class="card-title">Edit Iklan {{ $iklan->judul }}
                            </div>
                            <a href="{{ route('iklan.index') }}" class="btn  btn-warning btn-sm ml-auto">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('iklan.update', $iklan->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul Iklan</label>
                                <input type="text" name="judul_iklan" class="form-control" id="text"
                                    value="{{ $iklan->judul_iklan }}">
                            </div>
                            <div class="form-group">
                                <label for="judul">Link Iklan</label>
                                <textarea type="text" name="link" id="editor1" class="form-control">{{ $iklan->link }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $iklan->status == '1' ? 'selected' : '' }}>Publish
                                    </option>
                                    <option value="0" {{ $iklan->status == '0' ? 'selected' : '' }}>Draft
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Iklan</label>
                                <input type="file" name="gambar_iklan" class="form-control">
                                <br>
                                <label for="gambar">Gambar saat ini</label><br>
                                <img src=" {{ asset('storage/' . $iklan->gambar_iklan) }} " width="100">
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
