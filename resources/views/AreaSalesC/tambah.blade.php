@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Tambah Area Sales
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">Toko</li>
<li class="breadcrumb-item"><a href="{{route('tableC.index')}}">sales</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{route('tableC.store')}}" method="POST">
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
                    <label for="title">area sales</label>
                    <input required type="text" name="area_sales" maxlength="50" class="form-control" value="{{old('area_sales','')}}" placeholder="A,B,...">
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