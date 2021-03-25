@extends('layouts.desa')

{{-- config 1 --}}
@section('title', 'Perpustakaan | Perpustakaan')
@section('title-2', 'Perpustakaan')
@section('title-3', 'Perpustakaan')

@section('describ')
    Ini adalah halaman Perpustakaan untuk desa
@endsection

@section('icon-l', 'fa fa-book')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('desa.perpustakaan.perpustakaan') }}
@endsection

{{-- main content --}}
@section('content')
    