<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Transaksi</title>
	</head>

	<body>
        <div class="invoice-box">
			<table>
				<tr>
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<h5>Shutle<span class="green">Bus</span></h5>
								</td>
							</tr>
						</table>
					</td>
				</tr>
            </table>
                <table style="width: 100%">
        		<tr class="heading">
                    <td>#</td>
					<td>Nama</td>
					<td>Email</td>
                    <td>No.Telp</td>
                    <td>Destinasi</td>
					<td>Bus</td>
                    <td>Harga</td>
					<td>Jadwal</td>
                    <td>Sifat</td>
                    <td>Status</td>
            	</tr>
                @foreach($order as $key=>$d)
				<tr class="item">
                    <td>{{$key+1}}</td>
					<td>{{$d->nama}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->notelp}}</td>
                    <td>{{$d->orderproduk->produkbus->area->asal}} - {{$d->orderproduk->produkbus->area->tujuan}}</td>
                    <td>{{$d->orderproduk->produkbus->jenis}}</td>
                    <td>{{$d->harga}}</td>
                    <td>{{$d->jadwal}}</td>
                    <td>{{$d->sifat_pemesanan}}</td>
                    <td>{{$d->status}}</td>
                </tr>
                @endforeach
                </table>

		</div>
	</body>
</html>
<style>
    body {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        text-align: center;
        color: #777;
    }
    body h5 {
        font-weight: 300px;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
        font-size: 30px;
    }

    .invoice-box {
        max-width: 100%;
        margin: auto;
        padding: 5px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 12px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    /* .invoice-box table tr td:nth-child(2) {
        text-align: right;
    } */

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }


    }
    .green{
            color:#7AB730;
        }

</style>
