@extends('pemesan.master')

@section('content')
<div class="container-fluid  py-5" >
                <div class="container py-5">
                    <div class="row align-items-center">
                        <div class="col-lg-12 mb-5 mb-lg-0">
                            <div class="card border-0">
                                <div class="card-header bg-primary text-center p-4">
                                    <h1 class="text-white m-0">Status Pemesanan</h1>
                                </div>
                                <div class="card-body rounded-bottom bg-white p-5">
                                    <i>*upload bukti pembayaran untuk mendapatkan tiket</i>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Asal - Tujuan</th>
                                        <th scope="col">Jadwal</th>
                                        <th scope="col">Bus</th>
                                        <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order as $key=>$o)
                                        @foreach($daftarbus as $d)
                                        @if($o->kode_bus == $d->kode_bus)
                                            <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$d->area->asal}} - {{$d->area->tujuan}}</td>
                                            <td>{{$o->jadwal}}</td>
                                            <td>{{$o->kode_bus}}</td>
                                            <td><i>{{$o->status}}</i></td>
                               
                                            </tr>
                                        
                                        @endif
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
