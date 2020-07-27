@if ($errors->any())
 <div class="alert alert-danger">
  @lang('common.whoops')<br><br>

  <ul>
   @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
   @endforeach
  </ul>
 </div>
@endif
