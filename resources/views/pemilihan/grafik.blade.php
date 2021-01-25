@extends('template.master')

@section('title', 'Hasil Voting')

@section('content')
    <h1 class="text-center mt-4 mb-4">Hasil Voting</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/pemilihan') }}">Voting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hasil Voting</li>
                  </ol>
                </nav>
            </div>

            <div class="card col-md-12">
              <div id="voting"></div>
              
            </div>
            
       </div>
   </div>
   @endsection


@section('grafik')

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
      Highcharts.chart('voting', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
          },
          title: {
              text: 'Hasil Voting'
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          accessibility: {
              point: {
                  valueSuffix: '%'
              }
          },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: true,
                      format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                  }
              }
          },
          series: [{
              name: 'Brands',
              colorByPoint: true,
              data: {!! json_encode($hasil) !!}
          }]
      });
    
    </script>
@endsection