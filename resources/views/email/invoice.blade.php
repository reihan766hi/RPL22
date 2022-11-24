<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Invoice</title>

        <style type="text/css">
              body {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

        color: #777;
    }

    body h1 {
        font-weight: 300;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
    }

    body h3 {
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 20px;
        color: #555;
    }

    body a {
        color: #06f;
    }

    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
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

    .invoice-box .title {
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
     .title1{
     	text-align : center;
         padding : 24px;
     }
     .detail{


     }
        </style>

	</head>

	<body>

		<div class="invoice-box">
		<h1 class="title">Shutle<span class="green">Bus</span></h1>
			<h2 class="title1">Thanks For your Payment</h2>

            <h3>Payment Detail</h3>
            <div class="detail">
          	 <table style="width: 100%">

        		<tr class="heading">
					<td>Destinasi</td>
					<td>Bus</td>
                    <td>Jadwal</td>
                    <td>Price</td>
				</tr>

				<tr class="item">
					<td>{{$datas['data']->orderproduk->produkbus->area->asal}} - {{$datas['data']->orderproduk->produkbus->area->tujuan}}</td>
                    <td>{{$datas['data']->orderproduk->produkbus->kode_bus}} - {{$datas['data']->orderproduk->produkbus->jenis}}</td>
                    <td>{{$datas['data']->jadwal}}</td>
					<td>{{$datas['data']->orderproduk->harga}}</td>
				</tr>
				<tr class="total">
					<td></td>
                    <td></td>
                    <td></td>
					<td>Total: {{$datas['data']->orderproduk->harga}}</td>
				</tr>
                </table>
          	</div>
                <p>Thanks,<br/>
            	The ShutleBus Team</p>


		</div>
	</body>
</html>
