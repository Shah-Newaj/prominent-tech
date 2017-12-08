<div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                              <li><a href="{{url('/')}}" class="active">Home</a></li>
                              <li class="dropdown"><a href="#">Products<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php  $cats = DB::table('pro_cat')->get(); ?>
                                    @foreach($cats as $cat)
                                    <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                                    @endforeach
                                </ul>

                              </li> 
                                <li><a href="{{url('contact')}}">Contact</a></li>
                                <li><a href="{{url('about')}}">About</a></li>
                                <li><a href="{{url('features')}}">Features</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form action="{{url('search')}}" method="post">
                                <input type="text" placeholder="Search" name="search_data" id="proList"/> 
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
</div><!--/header-bottom-->