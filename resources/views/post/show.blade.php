@extends('layouts.dashboard')

@section('page-title', $post->title)

@section('content')
 <div class="row justify-content-center mt-3">
  <div class="col-md-8">
   <div class="card">
    <div class="card-body">
     <div class="media">
      @php($fullName = $post->author->full_name)

      <img class="mr-2 avatar-sm rounded-circle" src="{{ Avatar::create($fullName) }}"
           alt="{{ $fullName }}">

      <div class="media-body">
       <div class="row">
        <div class="@if (auth()->guard()->check() && $post->user_id == auth()->id()) col-6 @else col-12 @endif">
         <h5 class="m-0">{{ $fullName }}</h5>
         <p class="text-muted"><small>{{ $post->created_at->diffForHumans() }}</small></p>
        </div>

        @auth
         @if ($post->user_id == auth()->id())
          <div class="col-6">
           <div class="float-right">
            <a href="{{ $post->url->edit }}" class="btn btn-secondary btn-sm ml-2">@lang('common.edit')</a>

            <a href="{{ $post->url->delete }}" class="btn btn-danger btn-sm delete ml-1">@lang('common.delete')</a>
           </div>
          </div>
         @endif
        @endauth
       </div>
      </div>
     </div>

     <h2 class="mb-3">{{ $post->title }}</h2>

     {!! $post->content !!}
    </div>
   </div>
  </div>
 </div>
@endsection

@push('script')
 <script>
   $(document).ready(function () {
     $('.delete').each(function () {
       $(this).on('click', e => {
         e.preventDefault();

         Swal.fire({
           title: 'Are you sure want to delete this post?',
           type: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes',
           cancelButtonText: 'No',
         }).then(result => {
           if (result.value) {
             axios({
               method: 'DELETE',
               url: $(this).attr('href'),
             }).then(response => {
               window.location = '{{ route('posts.index') }}';
             });
           }
         });
       });
     });
   });
 </script>
@endpush
