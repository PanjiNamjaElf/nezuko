@extends('layouts.dashboard')

@section('content')
 @forelse ($posts->chunk(4) as $chunk)
  <div class="row mt-3">
   <div class="col-12">
    <div class="card-deck-wrapper">
     <div class="card-deck">
      @foreach ($chunk as $post)
       <div class="card">
        <img class="card-img-top img-fluid" src="/images/no-image.jpg" alt="{{ $post->title }}">

        <div class="card-body">
         <h5 class="card-title">
          <a href="{{ $post->url->show }}">{{ $post->title }}</a>
         </h5>
         <p class="card-text">{{ $post->excerpt }}</p>
         <p class="card-text">
          <small class="text-muted">@lang('common.posted_by') {{ $post->author->full_name }}</small>
          <br/>
          <small class="text-muted">{{ $post->created_at->diffForHumans() }} </small>
         </p>
        </div>
       </div>
      @endforeach
     </div>
    </div>
   </div>
  </div>
 @empty
  <div class="row">
   <div class="col-12">
    <div class="text-center">
     <h4>@lang('common.no_post_found')</h4>
    </div>
   </div>
  </div>
 @endforelse

 @pagination(['paginator' => $posts])
@endsection
