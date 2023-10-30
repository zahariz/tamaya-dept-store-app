@extends('layouts.admin.master')

@section('admin.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Master Prduk</h1>
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
                  <h3 class="card-title">Edit Produk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('produk.admin.update', $data->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama_produk">Nama Produk</label>
                      <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $data->nama_produk)}}" id="nama_produk" placeholder="Masukan Nama Produk" required autocomplete="nama_produk" autofocus>
                      @error('nama_produk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="merkProduk">Merk Produk</label>
                        <input type="text" name="merk_produk" class="form-control @error('merk_produk') is-invalid @enderror" id="merkProduk" placeholder="Masukan Merk Produk" required autocomplete="merk_produk" value="{{ old('merk_produk', $data->merk_produk)}}">
                        @error('merk_produk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="form-group">
                        <label for="namaProduk">Category Produk</label>
                        <select class="form-control @error('id_category_produk') is-invalid @enderror" id="id_category_produk" name="id_category_produk">
                            <option>--Please Select--</option>
                            @foreach ($getCategoryProduk as $item)
                            @if ($data->id_category_produk == $item->id)
                            <option value="{{$item->id}}" selected>{{$item->nama_category_produk}}</option>
                            @endif
                            <option value="{{$item->id}}">{{$item->nama_category_produk}}</option>
                            @endforeach
                        </select>
                        @error('id_category_produk')
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
                        <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qtyProduk" placeholder="Masukan Qty Produk" required autocomplete="qty" value="{{ old('qty', $data->qty)}}">
                        @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="form-group">
                        <label for="hargaProduk">Harga Produk</label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="hargaProduk" placeholder="Masukan Harga Produk" required autocomplete="harga" value="{{ old('harga', $data->harga)}}">
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
