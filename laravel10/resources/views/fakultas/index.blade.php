{{-- @include('layout.header', ['title' => 'Halaman Fakultas'])--}}

@extends('layout.master')
@section('title', 'Halaman Fakultas')

@section('content')
<h2>Fakultas</h2>

<ul>
    {{-- @foreach ($fakultas as $item)
        <li>{{$item}}</li>
    @endforeach --}}
    @if (count($fakultas) > 0)
        @foreach ($fakultas as $item)
            <li>{{$item}}</li>
        @endforeach
    @else
        <li>Belum ada data</li>
    @endif
</ul>
<x-alert :message="'Ini pesan sukses'"/>

@endsection

{{-- @include('layout.footer')--}}