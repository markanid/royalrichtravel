  @php
    $current_route = request()->route()->getName(); 
  @endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('admin-assets/dist/img/logo-white.png')}}" alt="Logo" class="" style="width: 200px;" >
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin-assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
            <li class="nav-item">
              <a href="{{route('dashboard')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            @if(auth()->user()?->role === 'admin')
            <li class="nav-item">
              <a href="{{route('banner.index')}}" class="nav-link {{$current_route=='banner.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>Banners</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('meta_data.index')}}" class="nav-link {{$current_route=='meta_data.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>Meta Data</p>
              </a>
            </li>
            
            <li class="nav-item">
               <a href="{{route('about.index')}}" class="nav-link {{$current_route=='about.index'?'active':''}}">
               <i class="nav-icon fas fa-users"></i>
                 <p>About</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="{{route('services.index')}}" class="nav-link {{$current_route=='services.index'?'active':''}}">
               <i class="nav-icon fas fa-users"></i>
                 <p>Services</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="{{route('packages.index')}}" class="nav-link {{$current_route=='packages.index'?'active':''}}">
               <i class="nav-icon fas fa-users"></i>
                 <p>Packages</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('features.index')}}" class="nav-link {{$current_route=='features.index'?'active':''}}">
               <i class="nav-icon fas fa-users"></i>
                 <p>Features</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('contact.index')}}" class="nav-link {{$current_route=='contact.index'?'active':''}}">
               <i class="nav-icon fas fa-users"></i>
                 <p>Contact</p>
               </a>
             </li>
           @endif
             
          @if(auth()->user()?->role === 'staff')
            <!--  <li class="nav-item">
              <a href="{{route('clients.index')}}" class="nav-link {{$current_route=='clients.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>Client</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('testimonial.index')}}" class="nav-link {{$current_route=='testimonial.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>Testimonial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('services.index')}}" class="nav-link {{$current_route=='services.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>Services</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('portfolio.index')}}" class="nav-link {{$current_route=='portfolio.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>Portfolio</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('blog.index')}}" class="nav-link {{$current_route=='blog.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>Blog</p>
              </a>
            </li> -->
            <!--  <li class="nav-item">
              <a href="{{route('contact.index')}}" class="nav-link {{$current_route=='contact.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>Contact</p>
              </a>
            </li> 

             <li class="nav-item">
              <a href="{{route('employee.index')}}" class="nav-link {{$current_route=='employee.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
                <p>employee</p>
              </a>
            </li>-->
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>