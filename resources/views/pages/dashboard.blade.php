@extends('layouts.dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="float-left"><h3>Dashboard</h3></div>
            </div>
            <div class="col-6">
                <div class="float-right" style="margin-right:30px; "><h3>Hi, {{ Auth::user()->name }}</h3></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><a href="/">Home</a></li>
                  <!-- <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li> -->
                </ol>
              </nav>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="card mb-4"  >
                        <div class="card-body text-center">
                          <!-- <i class='bx bx-dollar-circle bx-lg'></i> -->
                          <h5 class="card-title tex">Kekeruhan</h5>
                          <p class="card-text" id="ceksensor"><span id="keruh"> </span>NTU</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card mb-4"   >
                        <div class="card-body text-center">
                          <h5 class="card-title">pH</h5>
                          <p class="card-text"><span id="ph"></span></p>
                        </div>
                      </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card  mb-4"  >
                        <div class="card-body text-center">
                          <h5 class="card-title">Suhu</h5>
                          <p class="card-text"><span id="suhu"></span> C</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-3 col-12 " >
                    <div class="card  mb-4" >
                        <div class="card-body text-center">
                          <h5 class="card-title">Tinggi Air</h5>
                          <p class="card-text"><span id="tinggi"></span> %</p>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card mt-5" >
                <div class="curve_chart" id="curve_chart_kekeruhan" ></div>
            </div>
            <div class="card mt-5" style="margin-top:50px">
                <div class="curve_chart" id="curve_chart_ph" ></div>
            </div>
            <div class="card mt-5" style="margin-top:50px">
                <div class="curve_chart" id="curve_chart_suhu" ></div>
            </div>
            <div class="card mt-5" style="margin-top:50px">
                <div class="curve_chart" id="curve_chart_tinggi" ></div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script
    src=//code.jquery.com/jquery-3.5.1.min.js
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin=anonymous></script>
{{-- <script type="text/javascript">
    $(document).ready(function(){
        setInterval(function(){
            $("#ceksensor").load("ceksensor.php");
        }, 1000);
    });
</script> --}}
<script type="text/javascript">
    var vid = $( "#ceksensor" ).val();
    var request = function () {
    $.ajax({
          url: '/fresh_ph',
          type: "Get",
          data:{id:$("#ceksensor").val()}, // the value of input having id vid
           success: function(response){ // What to do if we succeed
            // $("#p").val(response.nilai_sensor); 
            $("#ph").html(response).show();
            console.log(response)
           }
        });
    
      };  setInterval(request, 1000);
</script>
<script type="text/javascript">
    var vid = $( "#ceksensor" ).val();
    var request = function () {
    $.ajax({
          url: '/fresh_suhu',
          type: "Get",
          data:{id:$("#ceksensor").val()}, // the value of input having id vid
           success: function(response){ // What to do if we succeed
            // $("#p").val(response.nilai_sensor); 
            $("#suhu").html(response).show();
            console.log(response)
           }
        });
    
      };  setInterval(request, 1000);
</script>
<script type="text/javascript">
    var vid = $( "#ceksensor" ).val();
    var request = function () {
    $.ajax({
          url: '/fresh_keruh',
          type: "Get",
          data:{id:$("#ceksensor").val()}, // the value of input having id vid
           success: function(response){ // What to do if we succeed
            // $("#p").val(response.nilai_sensor); 
            $("#keruh").html(response).show();
            console.log(response)
           }
        });
    
      };  setInterval(request, 1000);
</script>
<script type="text/javascript">
    var vid = $( "#ceksensor" ).val();
    var request = function () {
    $.ajax({
          url: '/fresh_tinggi',
          type: "Get",
          data:{id:$("#ceksensor").val()}, // the value of input having id vid
           success: function(response){ // What to do if we succeed
            // $("#p").val(response.nilai_sensor); 
            $("#tinggi").html(response).show();
            console.log(response)
           }
        });
    
      };  setInterval(request, 1000);
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- chart -->
    <script type="text/javascript">
        var ph = <?php echo $sensor_ph; ?>;
        console.log(ph);
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(SteppedAreaChartpH);

        function SteppedAreaChartpH() {
            var data = google.visualization.arrayToDataTable(ph);
            var options = {
                title: 'Grafik pH Air',
                curveType: 'function',
                colors: ['#1ea8c7'],
                pointSize: 10,
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.AreaChart(document.getElementById('curve_chart_ph'));
            chart.draw(data, options);
            window.addEventListener('resize', SteppedAreaChartpH, false);

        }        
    </script>
    <script type="text/javascript">
        var suhu = <?php echo $sensor_suhu; ?>;
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(SteppedAreaChartSuhu);

        function SteppedAreaChartSuhu() {
            var data = google.visualization.arrayToDataTable(suhu);
            var options = {
                title: 'Grafik Suhu Air',
                curveType: 'function',
                colors: ['#09829d'],
                pointSize: 10,
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.AreaChart(document.getElementById('curve_chart_suhu'));
            chart.draw(data, options);
            window.addEventListener('resize', SteppedAreaChartSuhu, false);
        }        
    </script>
    <script type="text/javascript">
        var kekeruhan = <?php echo $sensor_kekeruhan; ?>;
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(SteppedAreaChartKekeruhan);

        function SteppedAreaChartKekeruhan() {
            var data = google.visualization.arrayToDataTable(kekeruhan);
            var options = {
                title: 'Grafik Kekeruhan Air',
                curveType: 'function',
                colors: ['#09829d'],
                pointSize: 10,
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.AreaChart(document.getElementById('curve_chart_kekeruhan'));
            chart.draw(data, options);
            window.addEventListener('resize', SteppedAreaChartKekeruhan, false);
        }        
    </script>
    <script type="text/javascript">
        var tinggi = <?php echo $sensor_tinggi; ?>;
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(SteppedAreaChartTinggi);

        function SteppedAreaChartTinggi() {
            var data = google.visualization.arrayToDataTable(tinggi);
            var options = {
                title: 'Grafik Persentase Tinggi Air',
                curveType: 'function',
                colors: ['#1ea8c7'],
                pointSize: 10,
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.AreaChart(document.getElementById('curve_chart_tinggi'));
            chart.draw(data, options);
            window.addEventListener('resize', SteppedAreaChartTinggi, false);
        }        
    </script>

  <script>
      let btn =document.querySelector("#btn_navbar");
      let sidebar =document.querySelector(".sidebar");
      
      btn.onclick =function(){
          sidebar.classList.toggle("active");
      }

      let list = document.querySelectorAll('.list');
      for(let i=0; i<list.length; i++){
          list[i].onclick=function(){
              let j=0;
              while(j<list.length){
                  list[j++].className='list';
              }
              list[i].className = 'list active';
          }   
      }

  </script>
@endpush