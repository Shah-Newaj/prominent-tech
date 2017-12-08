      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{url('admin')}}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Products</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/addProduct')}}">Add Products</a></li>                          
                          <li><a class="" href="{{url('admin/products')}}">View Products</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Categories</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/addCat')}}">Add Categories</a></li>
                          <li><a class="" href="{{url('admin/categories')}}">View Categories</a></li>
                      </ul>
                  </li>
                 
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->