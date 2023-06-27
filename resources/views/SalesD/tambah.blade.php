@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Tambah Sales
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">Sales</li>
<li class="breadcrumb-item"><a href="{{route('tableD.index')}}">sales</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('tableD.store')}}" method="POST">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="title">kode sales</label>
                    <input required type="text" name="kode_sales" maxlength="5" class="form-control" value="{{old('kode_sales','')}}" placeholder="A1,A2,B2...">
                </div>
                <div class="form-group">
                    <label for="title">nama sales</label>
                    <input required type="text" name="nama_sales" maxlength="50" class="form-control" value="{{old('nama_sales','')}}" placeholder="Rudi,Budi,Tina...">
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