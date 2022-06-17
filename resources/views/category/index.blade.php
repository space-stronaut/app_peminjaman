@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header align-items-center justify-content-between">
                <div>
                    Kategori
                </div>
                <div>
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Buat Kategori</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $item)
                            <tr>
                                <th>
                                    {{$loop->iteration}}
                                </th>
                                <td>
                                    {{$item->kategori}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('category.destroy', $item->id) }}" method="post">
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