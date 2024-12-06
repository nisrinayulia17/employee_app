@extends('layouts.layout')

@section('content')
<div class="intro-container">
  <h1>Selamat Datang di Stark Industries!</h1>
  <p class="tagline">Inovasi teknologi untuk masa depan yang lebih cerdas.</p>
  <div class="box-button">
    <a href="{{ url ("/list") }}" class="btn btn-danger">Lihat Daftar Karyawan</a> 
    <a href="{{ url ("/add") }}" class="btn btn-danger">Tambah Data Karyawan</a> 
  </div>
</div>
@endsection