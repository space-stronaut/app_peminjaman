@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    Buat Kategori
                </div>
                <div>
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" name="kategori" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection