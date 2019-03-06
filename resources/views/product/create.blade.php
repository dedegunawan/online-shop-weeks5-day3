@extends('layouts.adminlte')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Produk</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="{{old('nama_produk')}}">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Kategori</label>
                                @php
								$kategories = \App\Kategori::all();
								$selected = old('kategori_id');
								@endphp
								<select class="form-control" name="kategori_id" id="kategori_id">
									<option value="" selected="selected">--Pilih Kategori--</option>
									@foreach($kategories as $kategori)
										<option value="{{$kategori['id']}}">{{$kategori['nama_kategori']}}</option>

									@endforeach
								</select>
                            </div>
                             <div class="form-group">
                               <label for="exampleInputFile">Foto Produk</label>
                               <input type="file" id="exampleInputFile" name="foto_produk">
                             </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status Produk</label>
                                <select name="Status" id="Status" class="form-control">
                                    <option value="0" selected="selected">drafted</option>
                                         <option>deleted</option>
                                         <option>published</option>
                                </select>
                          </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi')}}">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="{{old('harga')}}">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="{{old('stok')}}">
                            </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection