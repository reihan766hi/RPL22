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
                                        <th scope="col">Bukti</th>
                                        <th scope="col"></th>
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
                                            <td>
                                               <a href="http://127.0.0.1:8000/bukti_pembayaran/{{$o->bukti_pembayaran}}" target="__blank"><img class="img-fluid" src="/bukti_pembayaran/{{$o->bukti_pembayaran}}" alt="img" style="height: 100px; width:100px"></a>
                                                </td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$o->id}}">Upload</button></td>
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
            @foreach($order as $key=>$d)
            <div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="upload/{{$d->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Bukti pembayaran untuk {{$d->kode_bus}}</label>
                            <input type="file" class="form-control-file {{$errors->has('bukti_pembayaran') ? ' is-invalid' : ''}}" id="exampleFormControlFile1" name="bukti_pembayaran">
                            @error('bukti_pembayaran')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                               {{$message}}
                            </div>
                            @enderror
                        </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                        </div>

                  </div>
                </div>
              </div>
              @endforeach
@endsection
