@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Edit area sales
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">sales</li>
<li class="breadcrumb-item"><a href="{{route('tableC.index')}}">rea sales</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('tableC.update',[$tableC->kode_toko])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="title">kode toko</label>
                    <input readonly required type="number" name="kode_toko" maxlength="5" class="form-control" value="{{old('kode_toko',$tableC->kode_toko)}}">
                </div>
                <div class="form-group">
                    <label for="title">area sales</label>
                    <input required type="text" name="area_sales" maxlength="50" class="form-control" value="{{old('area_sales',$tableC->area_sales)}}">
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