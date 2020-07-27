<!DOCTYPE html>
<html>
 <head>
  @headMeta
  @headCss
 </head>

 <body class="loading authentication-bg authentication-bg-pattern">
  <div class="account-pages mt-5 mb-5">
   <div class="container">
    <div class="row justify-content-center">
     <div class="col-md-8 col-lg-6 col-xl-5">
      <div class="card bg-pattern">
       <div class="card-body p-4">
        <div class="text-center w-75 ml-auto mr-auto mt-auto mb-4">
         <div class="auth-logo">
          <a href="{{ route('home') }}" class="logo logo-dark text-center">
           <span class="logo-lg">
            <img src="/images/logo-dark.png" alt="" height="22">
           </span>
          </a>

          <a href="{{ route('home') }}" class="logo logo-light text-center">
           <span class="logo-lg">
            <img src="/images/logo-light.png" alt="" height="22">
           </span>
          </a>
         </div>
        </div>

        @yield('content')
       </div>
      </div>

      @hasSection('footer-content')
       <div class="row mt-3">
        <div class="col-12 text-center">
         @yield('footer-content')
        </div>
       </div>
      @endif
     </div>
    </div>
   </div>
  </div>

  <footer class="footer footer-alt text-white">
   {{ now()->year }} &copy; Nezuko - Content Management System by <a href="https://www.facebook.com/PanjiNamjaElf" class="text-dark">Panji Setya Nur Prawira</a>
  </footer>

  @include('partials.footer-js')
 </body>
</html>
