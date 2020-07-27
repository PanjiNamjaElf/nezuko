<div class="navbar-custom">
 <div class="container-fluid">
  <ul class="list-unstyled topnav-menu float-right mb-0">
   @guest
    <li class="dropdown d-none d-lg-inline-block">
     <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" href="{{ route('login') }}">
      <i class="mdi mdi-login noti-icon"></i>
      <span class="ml-1">@lang('common.login')</span>
     </a>
    </li>
   @else
    @php($fullName = auth()->user()->full_name)

    <li class="dropdown notification-list topbar-dropdown">
     <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
      <img src="{{ Avatar::create($fullName)->toBase64() }}" alt="user-image" class="rounded-circle">
      <span class="pro-user-name ml-1">{{ $fullName }} <i class="mdi mdi-chevron-down"></i></span>
     </a>

     <div class="dropdown-menu dropdown-menu-right profile-dropdown">
      <a href="{{ route('posts.index') }}" class="dropdown-item notify-item">
       <i class="mdi mdi-post"></i>
       <span>@lang('common.manage_posts')</span>
      </a>

      <div class="dropdown-divider"></div>

      <a href="{{ route('logout') }}" class="dropdown-item notify-item logout">
       <i class="mdi mdi-logout"></i>
       <span>@lang('common.logout')</span>
      </a>
     </div>
    </li>
   @endguest
  </ul>

  <div class="logo-box">
   <a href="{{ route('home') }}" class="logo logo-dark text-center">
    <span class="logo-sm">
     <img src="/images/logo-sm.png" alt="" height="22">
    </span>

    <span class="logo-lg">
     <img src="/images/logo-dark.png" alt="" height="20">
    </span>
   </a>

   <a href="{{ route('home') }}" class="logo logo-light text-center">
    <span class="logo-sm">
     <img src="/images/logo-sm.png" alt="" height="22">
    </span>
    <span class="logo-lg">
     <img src="/images/logo-light.png" alt="" height="20">
    </span>
   </a>
  </div>

  <div class="clearfix"></div>
 </div>
</div>
