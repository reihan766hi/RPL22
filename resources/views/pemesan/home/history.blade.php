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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Asal - Tujuan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
