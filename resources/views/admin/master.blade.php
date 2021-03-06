<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>@yield('title') | E-Shopper</title>

    <!-- Bootstrap CSS -->    
    <link href="{{asset('admin_theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('admin_theme/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('admin_theme/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_theme/css/font-awesome.min.css')}}" rel="stylesheet" />    
    
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('admin_theme/css/owl.carousel.css')}}" type="text/css">
	 <link href="{{asset('admin_theme/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="{{asset('admin_theme/css/fullcalendar.css')}}">
	<link href="{{asset('admin_theme/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/css/style-responsive.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_theme/css/xcharts.min.css')}}" rel=" stylesheet">	
	<link href="{{asset('admin_theme/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
  </head>

  <body>
    @include('admin.admin_header')
    @yield('content')
      <footer>
        <div class="container">
          <div class="copy text-center">
            Copyright 2017 <a href="">Shah Newaj</a>
          </div>
        </div>
      </footer>
    <!-- javascripts -->
    <script src="{{asset('admin_theme/js/jquery.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery-ui-1.10.4.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/jquery-1.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin_theme/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('admin_theme/js/bootstrap.min.js')}}"></script>
    <!-- nice scroll -->
    <script src="{{asset('admin_theme/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    
    <!--script for this page only-->
    <script src="{{asset('admin_theme/js/calendar-custom.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{asset('admin_theme/js/jquery.customSelect.min.js')}}" ></script>
	<script src="{{asset('admin_theme/assets/chart-master/Chart.js')}}"></script>
   
    <!--custome script for all page-->
    <script src="{{asset('admin_theme/js/scripts.js')}}"></script>
    <!-- custom script for this page-->
    <script src="{{asset('admin_theme/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('admin_theme/js/easy-pie-chart.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('admin_theme/js/xcharts.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery.autosize.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery.placeholder.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/gdp-data.js')}}"></script>	
	<script src="{{asset('admin_theme/js/morris.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/sparklines.js')}}"></script>	
	<script src="{{asset('admin_theme/js/charts.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery.slimscroll.min.js')}}"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});

  </script>

  </body>
</html>
