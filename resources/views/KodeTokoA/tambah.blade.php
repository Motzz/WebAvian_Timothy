@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Tambah Kode Toko
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">Toko</li>
<li class="breadcrumb-item"><a href="{{route('tableA.index')}}">Kode Toko</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('tableA.store')}}" method="POST">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="title">kode toko baru</label>
                    <input required type="number" name="kode_toko_baru" maxlength="5" class="form-control" value="{{old('kode_toko_baru','')}}">
                </div>
                <div class="form-group">
                    <label for="title">kode toko lama</label>
                    <input required type="number" name="kode_toko_lama" maxlength="50" class="form-control" value="{{old('kode_toko_lama','')}}">
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>


@endsection