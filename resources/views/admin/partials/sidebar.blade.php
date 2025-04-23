@php
$current_route = request()->route()->getName(); 
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="#" class="brand-link">
  <img src="{{asset('admin-assets/dist/img/logo.png')}}" alt="Logo" class="" style="width: 200px;" >
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
          <i class="nav-icon far fa-image"></i>
            <p>Banners</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('meta_data.index')}}" class="nav-link {{$current_route=='meta_data.index'?'active':''}}">
         <i class="nav-icon fas fa-code"></i>
            <p>Meta Data</p>
          </a>
        </li>
        
        <li class="nav-item">
           <a href="{{route('about.index')}}" class="nav-link {{$current_route=='about.index'?'active':''}}">
           <i class="nav-icon fas fa-info-circle"></i>
             <p>About</p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{route('services.index')}}" class="nav-link {{$current_route=='services.index'?'active':''}}">
           <i class="nav-icon fab fa-servicestack"></i>
             <p>Services</p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{route('packages.index')}}" class="nav-link {{$current_route=='packages.index'?'active':''}}">
           <i class="nav-icon fas fa-plane-departure"></i>
             <p>Packages</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{route('features.index')}}" class="nav-link {{$current_route=='features.index'?'active':''}}">
           <i class="nav-icon fas fa-feather-alt"></i>
             <p>Features</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{route('contact.index')}}" class="nav-link {{$current_route=='contact.index'?'active':''}}">
           <i class="nav-icon fas fa-address-book"></i>
             <p>Contact</p>
           </a>
         </li>
       @endif
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>