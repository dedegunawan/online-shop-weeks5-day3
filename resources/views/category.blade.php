@extends('layouts.adminlte')

@section('content')
    @for($i=0;$i<10;$i++)
        {{$i}}<br/>
    @endfor
    Daftar Kategori Produk
    @push('scripts')
        <script>
            alert('hello')
        </script>
    @endpush
@endsection
