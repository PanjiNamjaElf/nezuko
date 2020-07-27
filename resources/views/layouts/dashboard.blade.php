<!DOCTYPE html>
<html>
 <head>
  @headMeta
  @headCss
 </head>

 <body data-layout-mode="horizontal" data-layout='@json($layout)'>
  <div id="preloader">
   <div id="status">
    <div class="spinner">@lang('common.loading')</div>
   </div>
  </div>

  <div id="wrapper">
   @topbar

   <div class="content-page">
    <div class="content">
     <div class="container-fluid">
      @yield('content')
     </div>
    </div>

    @footer
   </div>
  </div>

  @footerJs
 </body>
</html>
