@if ($paginator->count() > 0)
 <div class="mt-2">
  <div class="row">
   <div class="col-sm-12 col-md-5">
    <p class="text-center text-md-left pt-1">
     @choice('pagination.pagination', $paginator->total(), [
      'start' => $paginator->firstItem(),
      'end'   => $paginator->lastItem(),
      'total' => $paginator->total()
     ])
    </p>
   </div>

   <div class="col-sm-12 col-md-7">
    <div class="text-right">
     {{ $paginator->withQueryString()->onEachSide(1)->links() }}
    </div>
   </div>
  </div>
 </div>
@endif
