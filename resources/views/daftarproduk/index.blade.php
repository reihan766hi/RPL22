@extends('layouts.master')

@section('title', 'Daftar Produk')
@section('content')
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Daftar Produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="/daftarproduk/tambahproduk" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
                <label for="exampleFormControlSelect1">Kode Bus</label>
                <select class="form-control " id="exampleFormControlSelect1" name="kodebus">
                @foreach ($daftarbus as $key=>$d )
                <option value="{{$d->id}}">{{$d->kode_bus}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Sifat Pemesanan</label>
                <select class="form-control " id="exampleFormControlSelect1" name="sifatpemesanan">
                    @foreach ($sifat as $key=>$d )
                    <option value="{{$d->status}}">{{$d->status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Harga</label>
                <input type="text" class="form-control" name="harga"  id="harga" placeholder="Harga" required>
            </div>
            <div class="form-group">
                <label for="nama">Jadwal</label>
                <input type="date" class="form-control" name="jadwal"  id="jadwal" placeholder="Jadwal" required>
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
  @foreach ($daftarproduk as $key=>$da )
    <div class="modal fade" id="modal-edit{{$da->id}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Edit Daftar Produk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <form action="daftarproduk/editproduk/{{$da->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
             <label for="exampleFormControlSelect1">Kode Bus</label>
              <select class="form-control " id="exampleFormControlSelect1" name="kodebus">
                @foreach ($daftarbus as $data)
                    <option value="{{$data->id}}" selected><A>{{ $data->kode_bus}} </A></option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
             <label for="exampleFormControlSelect1">Sifat Pemesanan</label>
              <select class="form-control " id="exampleFormControlSelect1" name="sifatpemesanan">
                <option value="{{$da->sifat_pemesanan}}">{{$da->sifat_pemesanan}}</option>
                @foreach ($sifat as $key=>$d )
                    <option value="{{$d->status}}">{{$d->status}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="nama">Harga</label>
              <input type="text" class="form-control" name="harga"  id="jenisbus" value="{{$da->harga}}" required>
            </div>
            <div class="form-group">
              <label for="nama">Jadwal</label>
              <input type="date" class="form-control" name="jadwal"  id="jenisbus" value="{{$da->jadwal}}" required>
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
                    <h3 class="card-title">Daftar Produk</h3>
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
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Harga </th>
                    <th>Sifat</th>
                    <th>Jadwal</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php

                        $no = 0;
                    @endphp
                  @foreach($daftarbus as $key=>$d)
                  @foreach($d->produk as $prd)
                    <tr>
                        <td>{{$no+=1}}</td>
                        <td>{{$d->jenis}}</td>
                        <td>{{$d->area->asal}}</td>
                        <td>{{$d->area->tujuan}}</td>
                        <td>Rp.{{$prd->harga}}</td>
                        <td>{{$prd->sifat_pemesanan}}</td>
                        <td>{{$prd->jadwal}}</td>
                        <td>
                        <img class="img-fluid" src="/gambar_bus/{{$d->gambar_bus}}" alt="img" style="height: 100px; width:100px">
                        </td>
                        <td>
                        <button type="button" class="btn  btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit{{$prd->id}}">Edit</button> &nbsp
                           <a href="#" class="btn btn-danger btn-sm delete-produk" akun-id="{{$prd->id}}" akun-name="{{$d->kode_bus}}">Hapus</a>
                        </td>
                    </tr>
                  @endforeach
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
        // "buttons": [ {
        //         extend: 'pdf',
        //         title: 'Daftar Produk'
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
	$('.delete-produk').click(function(){
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
		    window.location = "daftarproduk/hapusproduk/"+akun;
		  }
		});
	});
</script>
  @endsection
