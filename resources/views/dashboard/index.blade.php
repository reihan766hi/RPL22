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
              <a href="#" class="small-box-footer">Cetak Pdf <i class="fas fa-arrow-circle-down"></i></a>
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
      <hr /> 
      
      <div class="row">
        <div class="col-lg-3 col-6">
        
        </div>
      </div>
 
      <form action="/dashboard" method="get" enctype="multipart/form-data">
      @csrf
      <div class="row">
      <div class="col-lg-3 col-6">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Periode</label>
              <select class="form-control " id="tahun" name="tahun">
              <option value="2022" selected>2022</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
              </select>
            </div>
           
        </div>

        <div class="col-lg-3 col-6">
          <div class="form-group">
              <label for="exampleFormControlSelect1">Periode</label>
              <select class="form-control " id="bulan" name="bulan">
              <option value="12" selected>{{$bulan2}}</option>
              <option value="01">Januari</option>
              <option value="02">Febuari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
              </select>
            </div>
            
        </div>

        <div class="col-lg-3 col-6">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Area</label>
              <select class="form-control " id="area" name="area">
                <option value="">All</option>
                @foreach($getArea as $a)
                <option value="{{$a->id_produks}}">{{$a->orderproduk->produkbus->area->kode_area}} | {{$a->orderproduk->produkbus->area->asal}} - {{$a->orderproduk->produkbus->area->tujuan}}</option>
                @endforeach
              </select>
            </div>
   
        </div>

        <div class="col-lg-3 col-6">
        <label for="exampleFormControlSelect1">filter</label>
            <div>
              <button type="submit" class="btn btn-primary">Filter</button><br>
            </div>
          
        </div>
      </div>    
      </form>  

      <div class="row">
        <div class="col-lg-3 col-6">  
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <div><span>Total</span></div> 
                <h3>{{$data->count()}}<sup style="font-size: 20px"></sup></h3>
                <p>Total Pendapatan</p>
              <h3>Rp.{{$data->sum('harga')}}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Cetak Pdf <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">  
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <div><span>Total</span></div> 
                <h3>{{$data->count()}}<sup style="font-size: 20px"></sup></h3>
                <p>Total Pendapatan</p>
              <h3>Rp.{{$data->sum('harga')}}</h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
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
