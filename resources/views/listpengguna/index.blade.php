@extends('layouts.master')

@section('title', 'Daftar Pengguna')
@section('content')
{{-- <section class="content-header">
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
  </section> --}}


  <div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Tambah Daftar Pengguna</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="/postregister" method="post" enctype="multipart/form-data">
        @csrf

          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama" required>
          </div>
          <div class="form-group">
            <label for="nama">Username</label>
            <input type="text" class="form-control"  name="username" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label for="nama">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label for="nama">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="nama">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
          </div>
          <div class="form-group">
            <label for="nama">Tanggal Lahir</label>
            <div class="input-group mb-3 date" id="reservationdate" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
          </div>
            <input type="hidden" value="register" name="register">
          </div>
          <div class="form-group">
            <label for="nama">No HP</label>
            <input type="number" class="form-control" name="no_hp" placeholder="No HP" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Role</label>
             <select class="form-control " id="exampleFormControlSelect1" name="role">
               <option value="pemesan"><A>Pemesan</A></option>
               <option value="manager"><A>Manager</A></option>
               <option value="admin"><A>Admin</A></option>
             </select>
           </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div>
@foreach ($user as $key=>$d )
  <div class="modal fade" id="modal-edit{{$d->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Edit Akun {{$d->name}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
        <form action="daftarpengguna/edit/{{$d->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$d->name}}" required>
          </div>
          <div class="form-group">
            <label for="nama">Username</label>
            <input type="text" class="form-control"  name="username" placeholder="Username" value="{{$d->username}}" required>
          </div>
          <div class="form-group">
            <label for="nama">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label for="nama">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{$d->email}}"  required>
          </div>
          <div class="form-group">
            <label for="nama">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{$d->alamat}}" required>
          </div>
          <div class="form-group">
            <label for="nama">Tanggal Lahir</label>
            <div class="input-group mb-3 date" id="reservationdate" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_lahir" value="{{$d->tgl_lahir}}"  placeholder="Tanggal Lahir" required>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
          </div>
            <input type="hidden" value="register" name="register">
          </div>
          <div class="form-group">
            <label for="nama">No HP</label>
            <input type="number" class="form-control" name="no_hp" placeholder="No HP" value= "{{$d->no_hp}}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Role</label>
             <select class="form-control " id="exampleFormControlSelect1" name="role" value= "{{$d->role}}">
               <option value="pemesan"><A>Pemesan</A></option>
               <option value="manager"><A>Manager</A></option>
               <option value="admin"><A>Admin</A></option>
             </select>
           </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
      <!-- /.modal-dialog -->
  </div>
  @endforeach
</div>


  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
</section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengguna</h3>
                    <div class="float-right">
                </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                        Tambah
                    </button>
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>Tanggal Lahir</th>
                      <th>No Hp</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $key=>$us)
                      @if($us->role == "pemesan")
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$us->name}}</td>
                            <td>{{$us->username}}</td>
                            <td>{{$us->alamat}}</td>
                            <td>{{$us->email}}</td>
                            <td>{{$us->tgl_lahir}}</td>
                            <td>{{$us->no_hp}}</td>
                            <td>{{$us->role}}</td>
                            <td>
                                <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$us->id}}">Edit</button> &nbsp
                                <a href="#" class="btn btn-danger btn-sm delete-user" data-id="{{$us->id}}" data-name="{{$us->name}}">Hapus</a>
                            </td>
                        </tr>
                      @endif
                    @endforeach
                    </tfoot>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('footer')
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": [ {
        //         extend: 'pdf',
        //         title: 'Daftar Pengguna'
        //     }]
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
<script>
	$('.delete-user').click(function(){
		  var akun = $(this).attr('data-id');
      var name = $(this).attr('data-name');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus " +name + "?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {

		  if (willDelete) {
		    window.location = "deleteakun/"+akun;
		  }
		});
	});
</script>
  @endsection
