@extends('layouts.master')

@section('title', 'Daftar Bus')
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

        <div class="modal-body">
          <form action="/daftarbus/tambahbus" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="nama">Jenis Bus</label>
              <input type="text" class="form-control" name="jenisbus"  id="jenisbus" placeholder="Jenis Bus" required>
            </div>
            <div class="form-group">
              <label for="nama">Kode Bus</label>
              <input type="text" class="form-control" name="kodebus"  id="kodebus" placeholder="Kode Bus" required>
            </div>
            <div class="form-group">
              <label for="nama">Pabrikan</label>
              <input type="text" class="form-control" name="pabrikan"  id="pabrikan" placeholder="Pabrikan" required>
            </div>
            <div class="form-group">
              <label for="nama">No. Mesin</label>
              <input type="text" class="form-control" name="nomesin"  id="nomesin" placeholder="No. Mesin" required>
            </div>
            <div class="form-group">
              <label for="nama">Plat Nomor</label>
              <input type="text" class="form-control" name="platnomor"  id="platnomor" placeholder="Plat Nomor" required>
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
  @foreach ($daftarbus as $key=>$d )
    <div class="modal fade" id="modal-edit{{$d->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Edit {{$d->jenis}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <form action="daftarbus/editbus/{{$d->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="nama">Jenis Bus</label>
              <input type="text" class="form-control" name="jenisbus"  id="jenisbus" value="{{$d->jenis}}" required>
            </div>
            <div class="form-group">
              <label for="nama">Kode Bus</label>
              <input type="text" class="form-control" name="kodebus"  id="kodebus" value="{{$d->kode_bus}}" required>
            </div>
            <div class="form-group">
              <label for="nama">Pabrikan</label>
              <input type="text" class="form-control" name="pabrikan"  id="pabrikan" value="{{$d->pabrikan}}" required>
            </div>
            <div class="form-group">
              <label for="nama">No. Mesin</label>
              <input type="text" class="form-control" name="nomesin"  id="nomesin" value="{{$d->no_mesin}}" required>
            </div>
            <div class="form-group">
              <label for="nama">Plat Nomor</label>
              <input type="text" class="form-control" name="platnomor"  id="platnomor" value="{{$d->plat_nomor}}" required>
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
                    <th>Jenis Bus</th>
                    <th>Kode Bus</th>
                    <th>Pabrikan</th>
                    <th>No.Mesin</th>
                    <th>Plat Nomor</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($daftarbus as $key=>$d)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$d->jenis}}</td>
                        <td>{{$d->kode_bus}}</td>
                        <td>{{$d->pabrikan}}</td>
                        <td>{{$d->no_mesin}}</td>
                        <td>{{$d->plat_nomor}}</td>
                        <td>
                        <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$d->id}}">Edit</button> &nbsp
                           <a href="#" class="btn btn-danger btn-sm delete-bus" akun-id="{{$d->id}}" akun-name="{{$d->kode_bus}}">Hapus</a>
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
		    window.location = "daftarbus/hapusbus/"+akun;
		  }
		});
	});
</script>
  @endsection
