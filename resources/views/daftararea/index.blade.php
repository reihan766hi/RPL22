@extends('layouts.master')

@section('title', 'Daftar Area')
@section('content')
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah Daftar Area</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="/daftararea/tambaharea" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="nama">Asal</label>
              <input type="text" class="form-control" name="asal"  id="tujuan" placeholder="Asal Daerah" required>
            </div>
            <div class="form-group">
              <label for="nama">Tujuan</label>
              <input type="text" class="form-control" name="tujuan"  id="tujuan" placeholder="Tujuan" required>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Status</label>
              <select class="form-control " id="exampleFormControlSelect1" name="status">
                <option value="Dalam Kota"><A>Dalam Kota</A></option>
                <option value="Luar Kota"><A>Luar Kota</A></option>
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
  @foreach ($daftararea as $key=>$da )
    <div class="modal fade" id="modal-edit{{$da->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Edit Daftar Area</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <form action="daftararea/editarea/{{$da->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="nama">Asal</label>
              <input type="text" class="form-control" name="asal"  id="tujuan" value="{{$da->asal}}" required>
            </div>
            <div class="form-group">
              <label for="nama">Tujuan</label>
              <input type="text" class="form-control" name="tujuan"  id="tujuan" value="{{$da->tujuan}}" required>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Status</label>
              <select class="form-control " id="exampleFormControlSelect1" name="status">
                <option value="Dalam Kota"><A>Dalam Kota</A></option>
                <option value="Luar Kota"><A>Luar Kota</A></option>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Area</h3>
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
                    <th>Daerah Asal</th>
                    <th>Daerah Tujuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($daftararea as $key=>$da)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$da->asal}}</td>
                        <td>{{$da->tujuan}}</td>
                        <td>{{$da->status}}</td>
                        <td>
                        <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$da->id}}">Edit</button> &nbsp
                           <a href="#" class="btn btn-danger btn-sm delete-area" akun-id="{{$da->id}}" akun-name="{{$da->no_kode_bus}}">Hapus</a>
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
                title: 'Daftar Area'
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
	$('.delete-area').click(function(){
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
		    window.location = "daftararea/hapusarea/"+akun;
		  }
		});
	});
</script>

  @endsection
