@extends('layouts.admin.master')

@section('admin.content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Master Member</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Member</li>
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
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Member</h3>

                      <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                          <a class="btn btn-sm btn-primary" href="{{ route("member.admin.create") }}">Add Member</a>
                        </ul>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Customer</th>
                            <th>Jenis Member</th>
                            <th>Kartu Member</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th class="float-right">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                            @foreach ($member as $row)
                          <tr>

                            <td>{{ $no++ }}</td>
                            <td>{{ $row->customer }}</td>
                            <td>{{ $row->jenis_member }}</td>
                            <td>{{ $row->kartu_member }}</td>
                            <td>
                              {{ $row->alamat_member }}
                            </td>
                            <td><span class="badge bg-danger">{{ $row->no_telp }}</span></td>
                            <td class="d-flex justify-content-end">
                                <a class="btn btn-info btn-sm mr-2" href="{{ route('member.admin.edit', $row->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form action="{{ route("member.admin.destroy", $row->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
                                  </form>
                            </td>
                          </tr>
                          @endforeach


                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection
