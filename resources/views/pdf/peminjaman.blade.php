<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Struk Peminjaman
                    </div>
                    <div>
                        {{-- <a href="{{ route('pengajuan.index') }}" class="btn btn-primary">Kembali</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Tanggal Peminjaman</th>
                        <th>:</th>
                        <td>
                            {{ $peminjaman->tanggal_pinjam }}
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengembalian</th>
                        <th>:</th>
                        <td>
                            {{ $peminjaman->tanggal_selesai }}
                        </td>
                    </tr>
                    <tr>
                        <th>Peminjam</th>
                        <th>:</th>
                        <td>
                            {{ $peminjaman->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>Barang yang dipinjam</th>
                        <th>:</th>
                        <td>
                            {{ $peminjaman->alat->nama_alat }}
                        </td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th>:</th>
                        <td>
                            {{ $peminjaman->jumlah_pinjam }}
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td>
                            <div class="badge badge-{{ $peminjaman->status == 'dikembalikan' ? 'success' : 'danger' }} text-uppercase">{{ $peminjaman->status }}</div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>