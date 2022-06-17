@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    Edit
                </div>
                <div>
                    <a href="{{ route('alat.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('alat.update', $alat->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Alat</label>
                        <input type="text" name="nama_alat" value="{{ $alat->nama_alat }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ $alat->stok }}">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $alat->category_id ? 'selected' : ''}}>{{ $item->kategori }}</option>
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