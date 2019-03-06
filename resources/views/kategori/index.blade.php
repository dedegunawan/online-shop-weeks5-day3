@extends('layouts.adminlte')

@section('content')
<div class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('kategories.count')}}" class="btn btn-primary btn-xs pull-right">Hitung Ulang</a>

                <a href="{{route('kategories.create')}}" class="btn btn-primary btn-xs pull-right">Tambah</a>
            </div>
            <h3>Daftar Kategori</h3>
        </div>
        <div class="box-body table-responsive">

            @if(session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Produk</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kategories as $key => $kategori)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$kategori->nama_kategori?$kategori->nama_kategori:''}}</td>
                        <td>{{$kategori->jumlah_produk}}</td>
                        <td>
                            <a href="{{route('kategories.edit', ['menu' => $kategori['id'] ])}}">Edit</a>
                            ||
                            <a href="{{route('kategories.destroy', ['menu' => $kategori['id'] ])}}"  onclick="deleteMenu(event, this)">Hapus</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <form action="" id="form_delete_menu" method="post">
        @csrf
        @method('DELETE')
    </form>
    <script>
        function deleteMenu(event, el) {
            event.preventDefault();
            var cf = confirm("Apakah Anda yakin akan menghapus data?");
            if (cf) {
                $("#form_delete_menu").attr('action', $(el).attr('href'));
                $("#form_delete_menu").submit();
            }
        }
    </script>
@endpush
