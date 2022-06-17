@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    Peminjaman
                </div>
                <div>
                    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Ajukan Peminjaman</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Peminjam</th>
                            <th>Jumlah Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjamans as $item)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    {{$item->alat->nama_alat}}
                                </td>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    {{$item->jumlah_pinjam}}
                                </td>
                                <td>
                                    {{$item->tanggal_pinjam}}
                                </td>
                                <td>
                                    {{$item->tanggal_selesai}}
                                </td>
                                <td class="text-uppercase">
                                    {{-- <span class="badge badge-primary">Primary</span> --}}
                                    {{$item->status}}
                                </td>
                                <td class="d-flex align-items-center">
                                    @if (Auth::user()->role == 'admin' && $item->status == 'proses')
                                        <div>
                                            <form action="{{ route('peminjaman.validasi', $item->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="status" value="disetujui">
                                                <button class="btn btn-success">Setujui</button>
                                            </form>
                                        </div>
                                    @elseif(Auth::user()->role == 'dosen' && $item->status == 'disetujui')
                                    <div>
                                        <form action="{{ route('peminjaman.validasi', $item->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status" value="dikembalikan">
                                            <button class="btn btn-info">Kembalikan</button>
                                        </form>
                                    </div>
                                    @endif
                                    <div>
                                        <a href="{{ route('peminjaman.export', $item->id) }}" class="btn btn-info">Export</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>
                                    Belum Ada Data
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection