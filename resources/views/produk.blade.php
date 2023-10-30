@extends('layouts.public')

@section('content')

     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"> Produk <small>TAMAYA</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <div class="offset-md-2">
                        <form action="{{ route('home') }}" method="GET">
                            <div class="input-group">
                                <input type="search" name="cari" class="form-control form-control-lg" placeholder="Cari disini">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </ol>
              </div>

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
            <!-- Default box -->

            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
              @foreach ($data as $row)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Rak {{ $row->bin }}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $row->nama_produk }}</b></h2>
                      <p class="text-muted text-sm"><b>Merk: </b>{{ $row->merk_produk }}</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fa fa-cart-arrow-down"></i></span> Qty: {{ $row->qty }} EA</li>
                        <li class="small"><span class="fa-li">$</span> Harga: Rp. {{ number_format($row->harga) }}/Unit</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{ asset('storage/produk/' . $row->image) }}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @endforeach

          </div>
        </div>
        <!-- /.card-body -->

      </div>

      <!-- /.card -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->

@endsection
