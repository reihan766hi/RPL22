@extends('layouts.master')


@section('content')
<section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
</section>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <div><span>Total Hari Ini</span> <p style="float:right;">{{ $now}}</p></div> 
              <h3>{{$jumlahPesanan}}</h3>
              <p>Total Pendapatan</p>
              <h3>Rp.{{$jumlahPendapatan}}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Cetak Pdf <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <div><span>Total Bulan Ini</span></div> 
                <h3>{{$totalOrderMonth}}<sup style="font-size: 20px"></sup></h3>
                <p>Total Pendapatan</p>
              <h3>Rp.{{$tOM}}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer" style="width:100px;">Cetak Pdf <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <div><span>Total Institusi</span></div>
                <h3>{{$totalInstitusi}}</h3>

                <p>Total Pendapatan</p>
                <h3>Rp.{{$tPI}}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Cetak Pdf <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>
      </div>
  </div>
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
