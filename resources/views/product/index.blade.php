@extends('layouts.adminlte')

@section('content')
<div class="content">
    <div class="box">
        <div class="box-header">
            <a href="{{route('products.create')}}" class="btn btn-primary btn-xs pull-right">Tambah</a>
            <h3>Daftar Produk</h3>
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
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$product->nama_produk?$product->nama_produk:''}}</td>
                        <td>{{@$product['kategori']['nama_kategori']}}</td>
                        <td><img src="{{asset($product->foto_produk)}}" alt="" style="max-width: 100px;max-height: 100px"></td>
                        <td>{{$product->stok}}</td>
                        <td>{{$product->harga}}</td>
                        <td>{{$product->deskripsi}}</td>
                        <td>
                            <a href="{{route('products.edit', ['product' => $product['id'] ])}}">Edit</a>
                            ||
                            <a href="{{route('products.destroy', ['product' => $product['id'] ])}}"  onclick="deleteMenu(event, this)">Hapus</a>
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
    <form action="" id="form_delete_product" method="post">
        @csrf
        @method('DELETE')
    </form>
    <script>
        function deleteMenu(event, el) {
            event.preventDefault();
            var cf = confirm("Apakah Anda yakin akan menghapus data?");
            if (cf) {
                $("#form_delete_product").attr('action', $(el).attr('href'));
                $("#form_delete_product").submit();
            }
        }
    </script>
@endpush
