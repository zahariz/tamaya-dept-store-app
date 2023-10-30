@extends('layouts.admin.master')

@section('admin.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Plae In Storage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Warehouse</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-12">
               <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Place In Storage</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('wm.admin.store') }}" method="POST" >
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="id_produk">Nama Produk</label>
                      <select class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" name="id_produk">
                        <option>--Please Select--</option>
                        @foreach ($produk as $item)
                        <option value="{{ $item->id}}">{{$item->nama_produk}}</option>
                        @endforeach
                    </select>
                      @error('id_produk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_sbin">Storage Bin</label>
                        <select class="form-control @error('id_sbin') is-invalid @enderror" id="id_sbin" name="id_sbin">
                          <option>--Please Select--</option>
                          @foreach ($bin as $item)
                          <option value="{{ $item->id}}">{{$item->bin}}</option>
                          @endforeach
                      </select>
                        @error('id_sbin')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection
