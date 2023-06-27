@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Tambah Penjualan
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">Toko</li>
<li class="breadcrumb-item"><a href="{{route('tableB.index')}}">Penjualan</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('tableB.store')}}" method="POST">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label>Toko</label>
                    <select required name="kode_toko" class="form-control select2bs4" style="width: 100%;">
                        <option value="0">--Pilih Kode Toko--</option>
                        @foreach($tableA as $data)
                        <option value="{{$data->kode_toko_baru}}">{{$data->kode_toko_baru}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">nominal Transaksi</label>
                    <input required type="number" name="nominal_transaksi" maxlength="50" class="form-control" value="{{old('nominal_transaksi','')}}">
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