@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header align-items-center justify-content-between">
                <div>
                    Alat
                </div>
                <div>
                    <a href="{{ route('alat.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alats as $item)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    {{$item->nama_alat}}
                                </td>
                                <td>
                                    {{$item->stok}}
                                </td>
                                <td>
                                    {{$item->category->kategori}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('alat.edit', $item->id) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('alat.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Hapus</button>
                                        </form>
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