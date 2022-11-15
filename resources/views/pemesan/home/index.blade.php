@extends('pemesan.master')

@section('content')
<div class="container-fluid p-0" style="margin-top: -100px;">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="gambar_bus/corousel1.jpeg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                        <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="user/img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                        <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
<!-- Carousel End -->

<!-- Booking Start -->

<div class="container-fluid booking mt-5 pb-5">

    <div class="container pb-5">
        <form method="post" action="/searchresult">
            @csrf
        <div class="bg-light shadow" style="padding: 30px;">
            <div class="row align-items-center" style="min-height: 60px;">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <select class="custom-select px-4" style="height: 47px;" name="asal">
                                    <option value="">Asal</option>
                                    @foreach ($daftararea1->unique('asal') as $key=>$d )
                                        <option value={{$d->asal}}>{{$d->asal}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <select class="custom-select px-4" style="height: 47px;" name="tujuan">
                                    <option value="">Tujuan</option>
                                    @foreach ($daftararea1->unique('tujuan') as $key=>$d )
                                        <option value={{$d->tujuan}}>{{$d->tujuan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Cari</button>
                </div>

            </div>
        </div>
    </form>
    </div>
</div>

<!-- Booking End -->

<!-- Packages Start -->
<div class="container-fluid py-5" style="margin-top: -120px;">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Available Bus</h6>
            <h1>Choose your bus!</h1>
        </div>
        <div class="row">
            @foreach($daftarbus as $key=>$d)
            @foreach($d->produk as $prd)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="/gambar_bus/{{$d->gambar_bus}}" alt="img" style="height: 200px; width:350px">
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$d->area->asal}}</small><br>
                            <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{$prd->jadwal}}</small>
                            <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{$prd->sifat_pemesanan}}</small>

                        </div>
                        <a class="h5 text-decoration-none" href=""><b>{{$d->jenis}}</b> ({{$d->kode_bus}})</a><br>
                        <a class="h6 text-decoration-none" href="">{{$d->area->kode_area}} | {{$d->area->asal}} - {{$d->area->tujuan}}</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="m-10" style="margin-top: 10px;">Rp.{{$prd->harga}}</h5>
                                <h6><a href="/formpemesanan/{{$prd->id}}/checkout" class="btn btn-primary py-md-2 px-md-3 mt-1">Pesan</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</div>
<!-- Packages End -->


@endsection
