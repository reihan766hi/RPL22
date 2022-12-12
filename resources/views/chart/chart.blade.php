@extends('layouts.master')

@section('title', 'Grafik')

@section('header')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@section('content')


<div>
    <canvas id="myChart"></canvas>
</div>


<script>
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);

const data = {
    labels: cData.label,
    datasets: [{
        label: 'Graphic Pemesanan Per Jenis Bus',
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        borderWidth: 1,
        data:cData.data,
    }]
};

const config = {
  type: 'bar',
  data: data,
  options: {

  },
};

new Chart(
    document.getElementById('myChart'),
    config
);
    // $(function(){
    //     //get the pie chart canvas
    //     var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    //     var ctx = $("#pie-chart");

    //     //pie chart data
    //     var data = {
    //       labels: cData.data,
    //       datasets: [
    //         {
    //           label: "Users Count",
    //           data: cData.data,
    //           backgroundColor: [
    //             "#DEB887",
    //             "#A9A9A9",
    //             "#DC143C",
    //             "#F4A460",
    //             "#2E8B57",
    //             "#1D7A46",
    //             "#CDA776",
    //           ],
    //           borderColor: [
    //             "#CDA776",
    //             "#989898",
    //             "#CB252B",
    //             "#E39371",
    //             "#1D7A46",
    //             "#F4A460",
    //             "#CDA776",
    //           ],
    //           borderWidth: [1, 1, 1, 1, 1,1,1]
    //         }
    //       ]
    //     };

    //     //options
    //     var options = {
    //       responsive: true,
    //       title: {
    //         display: true,
    //         position: "top",
    //         text: "Grafik Kegiatan Per Jenis Bus",
    //         fontSize: 18,
    //         fontColor: "#111"
    //       },
    //       legend: {
    //         display: true,
    //         position: "bottom",
    //         labels: {
    //           fontColor: "#333",
    //           fontSize: 16
    //         }
    //       }
    //     };

    //     //create Pie Chart class object
    //     var chart1 = new Chart(ctx, {
    //       type: "pie",
    //       data: data,
    //       options: options
    //     });

    // });
  </script>
@endsection
