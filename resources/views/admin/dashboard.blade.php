@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
        </div>
    </div>
    <!-- row -->
    <div class="row tm-content-row">

        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
            <div class="tm-bg-primary-dark tm-block">
                <h2 class="tm-block-title">Kategori Produk</h2>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
            <div class="tm-bg-primary-dark tm-block">
                <h2 class="tm-block-title">Total Produk</h2>
                <h1 class="text-white">{{$jumlah}}</h1>
            </div>
        </div>

        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Orders List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ORDER NO.</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">OPERATORS</th>
                            <th scope="col">LOCATION</th>
                            <th scope="col">DISTANCE</th>
                            <th scope="col">START DATE</th>
                            <th scope="col">EST DELIVERY DUE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><b>#122349</b></th>
                            <td>
                                <div class="tm-status-circle moving">
                                </div>Moving
                            </td>
                            <td><b>Oliver Trag</b></td>
                            <td><b>London, UK</b></td>
                            <td><b>485 km</b></td>
                            <td>16:00, 12 NOV 2018</td>
                            <td>08:00, 18 NOV 2018</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{asset('assets/admin/js/axios.min.js')}}"></script>
<script>
    Chart.defaults.global.defaultFontColor = 'white';
    let ctxBar,
        optionsBar,
        configBar,
    barChart;

var nameProduct
var countProduct

axios.get('{{ url('/datacategory/name') }}')
        .then(function (response) {
            // console.log(response.data) 
            nameProduct = response.data.name
            countProduct = response.data.count
            drawBarChart()
        });

function drawBarChart() {
  if ($("#barChart").length) {
    ctxBar = document.getElementById("barChart").getContext("2d");

    optionsBar = {
      responsive: true,
      scales: {
        yAxes: [
          {
            barPercentage: 0.2,
            ticks: {
              beginAtZero: true
            },
            scaleLabel: {
              display: true,
              labelString: "Hits"
            }
          }
        ]
      }
    };

    optionsBar.maintainAspectRatio =
      $(window).width() < width_threshold ? false : true;

    /**
     * COLOR CODES
     * Red: #F7604D
     * Aqua: #4ED6B8
     * Green: #A8D582
     * Yellow: #D7D768
     * Purple: #9D66CC
     * Orange: #DB9C3F
     * Blue: #3889FC
     */


     
    configBar = {
      type: "horizontalBar",
      data: {
        labels: nameProduct,
        datasets: [
          {
            label: "# of Hits",
            data: countProduct,
            backgroundColor: [
              "#F7604D",
              "#4ED6B8",
              "#A8D582",
              "#D7D768",
              "#9D66CC",
              "#DB9C3F"
            ],
            borderWidth: 0
          }
        ]
      },
      options: optionsBar
    };

    barChart = new Chart(ctxBar, configBar);
  }
}

</script>
@endsection