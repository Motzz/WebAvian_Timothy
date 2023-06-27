@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Edit Sales
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">Sales</li>
<li class="breadcrumb-item"><a href="{{route('tableA.index')}}">sales</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('tableD.update',[$tableD->kode_sales])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="title">kode sales</label>
                    <input required type="number" name="kode_sales" maxlength="5" class="form-control" value="{{old('kode_sales',$tableD->kode_sales)}}">
                </div>
                <div class="form-group">
                    <label for="title">nama sales</label>
                    <input required type="number" name="nama_sales" maxlength="50" class="form-control" value="{{old('nama_sales',$tableD->nama_sales)}}">
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