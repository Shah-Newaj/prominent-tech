@extends('front.master')

@section('title','About')

@section('content')

	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">About <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
						<img src="{{asset('images/about/about.jpg')}}" width="1150px" height="400px" />
					</div>
				</div>			 		
			</div>    	
    	</div>	
    </div><!--/#contact-page-->

@endsection