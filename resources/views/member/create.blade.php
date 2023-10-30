@extends('layouts.admin.master')

@section('admin.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Master Prduk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Produk</li>
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
                  <h3 class="card-title">Create Member</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('member.admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="customer">Customer</label>
                      <input type="text" name="customer" class="form-control @error('customer') is-invalid @enderror" value="{{ old('customer') }}" id="customer" placeholder="Masukan Nama Produk" required autocomplete="customer" autofocus>
                      @error('customer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                      <div class="form-group">
                        <label for="namaProduk">Jenis Member</label>
                        <select class="form-control @error('id_jenis_member') is-invalid @enderror" id="id_jenis_member" name="id_jenis_member">
                            <option>--Please Select--</option>
                            @foreach ($jenis_member as $item)
                            <option value="{{ $item->id}}">{{$item->nama_jenis}}</option>
                            @endforeach
                        </select>
                        @error('id_jenis_member')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        </div>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="qtyProduk">Qty Produk</label>
                        <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qtyProduk" placeholder="Masukan Qty Produk" required autocomplete="">
                        @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="form-group">
                        <label for="hargaProduk">Harga Produk</label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="hargaProduk" placeholder="Masukan Harga Produk" required autocomplete="">
                        @error('harga')
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
