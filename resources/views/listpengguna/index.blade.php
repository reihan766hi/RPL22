@extends('layouts.master')

@section('title', 'Daftar Pengguna')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Username</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>Tanggal Lahir</th>
              <th>No Hp</th>
              <th>Role</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($user as $us)
              @if($us->role == "pemesan")
                <tr>
                    <td>{{$us->name}}</td>
                    <td>{{$us->username}}</td>
                    <td>{{$us->alamat}}</td>
                    <td>{{$us->email}}</td>
                    <td>{{$us->tgl_lahir}}</td>
                    <td>{{$us->no_hp}}</td>
                    <td>{{$us->role}}</td>
                </tr>
              @endif
            @endforeach
            </tfoot>
          </table>
      </div>
      <!-- /.card-body -->

      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection

@section('footer')
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [ {
                extend: 'pdf',
                title: 'Daftar Pengguna'
            }]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  @endsection
