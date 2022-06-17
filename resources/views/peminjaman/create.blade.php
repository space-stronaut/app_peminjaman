@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    Ajukan Peminjaman
                </div>
                <div>
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('peminjaman.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" value="proses">
                    <div class="form-group">
                        <label for="">Alat yang ingin dipinjam</label>
                        <select name="alat_id" id="" class="form-control">
                            <option value="">Pilih...</option>
                            @foreach ($alats as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_alat }} - Stok : {{ $item->stok }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Pinjam</label>
                        <input type="number" name="jumlah_pinjam" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Peminjaman(Start)</label>
                        <input type="date" name="tanggal_pinjam" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Selesai(End)</label>
                        <input type="date" name="tanggal_selesai" id="" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection