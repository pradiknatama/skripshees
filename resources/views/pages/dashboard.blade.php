@extends('layouts.dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h3>Dashboard</h3>
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
                    <div class="card mb-3" >
                        <div class="card-body text-center">
                          <!-- <i class='bx bx-dollar-circle bx-lg'></i> -->
                          <h5 class="card-title tex">pH</h5>
                          <p class="card-text" id="ceksensor"><span id="ph"></span></p>
                        </div>
                      </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card mb-3" >
                        <div class="card-body text-center">
                          <h5 class="card-title">Kekeruhan</h5>
                          <p class="card-text"><span id="keruh"></span></p>
                        </div>
                      </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card  mb-3" >
                        <div class="card-body text-center">
                          <h5 class="card-title">Suhu</h5>
                          <p class="card-text"><span id="suhu"></span>0</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card  mb-3" >
                        <div class="card-body text-center">
                          <h5 class="card-title">Tinggi Air</h5>
                          <p class="card-text"><span id="tinggi"></span></p>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card mt-5" style="margin-top:50px">
                <div id="curve_chart" ></div>
            </div>
            <div class="card mt-5" style="margin-top:50px">
                <div id="curve_chart" ></div>
            </div>
            <div class="card mt-5" style="margin-top:50px">
                <div id="curve_chart" ></div>
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
    <script type="text/javascript">
        var jarak1 = <?php echo $jarak1; ?>;
        console.log(jarak1);
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(lineChart);

        function lineChart() {
            var data = google.visualization.arrayToDataTable(jarak1);
            var options = {
                title: 'Jarak',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
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