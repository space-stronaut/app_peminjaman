@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    Tambah
                </div>
                <div>
                    <a href="{{ route('alat.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('alat.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="number" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection