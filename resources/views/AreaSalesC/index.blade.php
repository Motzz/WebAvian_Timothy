@extends('layouts.home_master')



@section('judul')
sales
@endsection

@section('pathjudul')
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item">sales</li>
<li class="breadcrumb-item active">area sales</li>
@endsection

@section('content')


<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Area Sales</h3>
                    @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                    @endif
                    <a href="{{route('tableC.create')}}" class="btn btn-primary btn-responsive float-right">Tambah Area sales
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                    </a>
                    <a href="{{route('ExcelC')}}" class="btn btn-success btn-responsive float-right">Unggah data Area sales
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Toko</th>
                                <th>area sales</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <th>{{$d->kode_toko}}</th>
                                <td>{{$d->area_sales}}</td>

                                <td>

                                    <a class="btn btn-default bg-info" href="{{route('tableC.edit',[$d->kode_toko])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button type="button" class="btn btn-default bg-info" data-toggle="modal" data-target="#detail_{{$d->kode_toko}}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="modal fade" id="detail_{{$d->kode_toko}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Detail Area Sales</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Kode Toko Baru : {{$d->kode_toko}}</p>

                                                    <p>Kode Toko Lama : {{$d->area_sales}}</p>


                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>


                                    <button type="button" class="btn btn-default bg-danger" data-toggle="modal" data-target="#delete_{{$d->kode_toko}}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <div class="modal fade" id="delete_{{$d->kode_toko}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    Apakah anda yakin mau menghapus "{{$d->kode_toko}}"
                                                </div>

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                                    <form action="{{route('tableC.destroy',[$d->kode_toko])}}" method="POST" class="btn btn-responsive">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button action="{{route('tableC.destroy',[$d->kode_toko])}}" class="btn btn-default bg-danger">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>



                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Kode Toko</th>
                                <th>area sales</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

@endsection