@extends('layouts.master')


@section('content')
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
                    <h3 class="card-title">Daftar Pesanan</h3>
                    <div class="float-right">
                </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Destinasi</th>
                    <th>Jadwal</th>
                    <th>Bus</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($order as $key=>$o)
                  @if($o->bukti_pembayaran != NULL)
                    <tr>
                        <td>{{$o->nama}}</td>
                        <td>{{$o->orderproduk->produkbus->area->asal}} - {{$o->orderproduk->produkbus->area->tujuan}}</td>
                        <td>{{$o->jadwal}}</td>
                        <td>{{$o->orderproduk->produkbus->kode_bus}} - {{$o->orderproduk->produkbus->jenis}}</td>
                        <td>
                        <img class="img-fluid" src="/bukti_pembayaran/{{$o->bukti_pembayaran}}" alt="img" style="height: 70px; width:70px">
                        </td>
                        <td><i>{{$o->status}}</i></td>
                        <td>
                          @if($o->status == "menunggu konfirmasi")
                           <a href="/konfirmasi/{{$o->id}}" class="btn btn-warning"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp
                           <a href="{{$o->id}}/konfirmasi" class="btn btn-danger" ><i class="fa fa-times" aria-hidden="true"></i></a>
                          @elseif($o->status = "selesi")
                            <a href="/invoice/{{$o->id}}" class="btn btn-primary" >PDF</a>&nbsp
                            <a href="{{$o->id}}/konfirmasi" class="btn btn-danger" ><i class="fa fa-times" aria-hidden="true"></i></a>
                          @endif
                          </td>
                    </tr>
                    @endif
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
