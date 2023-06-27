@extends('layouts.home_master')
<style>
    p {
        font-family: 'Nunito', sans-serif;
    }
</style>

@section('judul')
Unggah Area Sales
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">Sales</li>
<li class="breadcrumb-item"><a href="{{route('tableC.index')}}">Area Sales</a></li>
<li class="breadcrumb-item active">Unggah excel</li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{ route('uploadExcelC') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Pilih File Excel:</label>
                <input type="file" class="form-control" name="file" id="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Unggah</button>
        </form>

    </div>
</div>


@endsection