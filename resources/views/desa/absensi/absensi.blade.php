@extends('layouts.desa')

{{-- config 1 --}}
@section('title', 'Absensi | Absensi Desa')
@section('title-2', 'Absensi Desa')
@section('title-3', 'Absensi Desa')

@section('describ')
    Ini adalah halaman absensi untuk desa
@endsection

@section('icon-l', 'fa fa-clipboard-list')
@section('icon-r', 'icon-home')

@section('link')
    {{ route('desa.absensi.absensi') }}
@endsection

