@extends('layouts.master')

@section('title', 'Daftar Sifat')
@section('content')
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah Daftar Bus</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- create --}}
        <div class="modal-body">
          <form action="/tambahsifat" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="nama">Sifat</label>
              <input type="text" class="form-control" name="status" placeholder="Sifat" required>
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
  @foreach ($data as $key=>$d )
    <div class="modal fade" id="modal-edit{{$d->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Edit {{$d->status}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <form action="editsifat/{{$d->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="nama">Sifat</label>
              <input type="text" class="form-control" name="status"  value="{{$d->status}}" required>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Bus</h3>
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
                    <th>Sifat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $key=>$d)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$d->status}}</td>
                        <td>
                        <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$d->id}}">Edit</button> &nbsp
                           <a href="#" class="btn btn-danger btn-sm delete-bus" akun-id="{{$d->id}}" akun-name="{{$d->status}}">Hapus</a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
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
<script>
	$('.delete-bus').click(function(){
		  var akun = $(this).attr('akun-id');
      var name = $(this).attr('akun-name');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus " +name + "?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {

		  if (willDelete) {
		    window.location = "hapusstatus/"+akun;
		  }
		});
	});
</script>
  @endsection
