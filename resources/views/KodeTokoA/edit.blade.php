@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Edit Kode Toko
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">Toko</li>
<li class="breadcrumb-item"><a href="{{route('tableA.index')}}">Kode Toko</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('tableA.update',[$tableA->kode_toko_baru])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="title">Cid pulau</label>
                    <input required type="number" name="kode_toko_baru" maxlength="5" class="form-control" value="{{old('kode_toko_baru',$tableA->kode_toko_baru)}}">
                </div>
                <div class="form-group">
                    <label for="title">Nama Pulau</label>
                    <input required type="number" name="kode_toko_lama" maxlength="50" class="form-control" value="{{old('kode_toko_lama',$tableA->kode_toko_lama)}}">
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