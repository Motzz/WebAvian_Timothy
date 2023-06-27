@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Edit Penjualan
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">Toko</li>
<li class="breadcrumb-item"><a href="{{route('tableA.index')}}">Penjualan</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('tableB.update',[$tableB->kode_toko])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">

                    <div class="form-group">
                        <label for="title">Toko</label>
                        <input readonly type="number" name="kode_toko" maxlength="50" class="form-control" value="{{old('kode_toko',$tableB->kode_toko)}}">
                    </div>

                </div>
                <div class="form-group">
                    <label for="title">nominal Transaksi</label>
                    <input required type="number" name="nominal_transaksi" maxlength="50" class="form-control" value="{{old('nominal_transaksi',$tableB->nominal_transaksi)}}">

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