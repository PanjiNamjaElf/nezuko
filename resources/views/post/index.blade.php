@extends('layouts.dashboard')

@section('page-title', __('page.posts'))

@section('content')
 <div class="row mt-3">
  <div class="col-12">
   <div class="card-box">
    <div class="text-right mb-3">
     <a href="{{ route('posts.create') }}" class="btn btn-secondary btn-sm">@lang('common.new_post')</a>
    </div>

    <div class="table-responsive">
     <table class="table table-borderless table-hover table-nowrap table-centered m-0">
      <thead class="thead-light">
       <tr>
        <th>@lang('common.title')</th>
        <th>@lang('common.created_at')</th>
        <th>@lang('common.status')</th>
        <th>@lang('common.action')</th>
       </tr>
      </thead>

      <tbody>
       @forelse ($posts as $post)
        <tr>
         <td>
          <a href="{{ $post->url->show }}">{{ $post->title }}</a>
         </td>
         <td>{{ $post->created_at }}</td>
         <td>
          @if ($post->status == 'published')
           <span class="badge badge-success">@lang('common.published')</span>
          @elseif ($post->status == 'draft')
           <span class="badge badge-warning">@lang('common.draft')</span>
          @else
           <span class="badge badge-primary">@lang('common.not_available')</span>
          @endif
         </td>

         <td>
          <a href="{{ $post->url->edit }}" class="btn btn-xs btn-success" title="{{ __('common.edit_post') }}">
           <i class="mdi mdi-pencil"></i>
          </a>

          <a href="{{ $post->url->delete }}" class="btn btn-xs btn-danger delete" title="{{ __('common.delete_post') }}">
           <i class="mdi mdi-trash-can-outline"></i>
          </a>
         </td>
        </tr>
       @empty
        <tr class="odd">
         <td valign="top" colspan="4" class="table-empty">@lang('common.no_data_available')</td>
        </tr>
       @endforelse
      </tbody>
     </table>
    </div>

    @pagination(['paginator' => $posts])
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
           title: '{{ __('alert.delete_post') }}',
           type: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: '{{ __('common.yes') }}',
           cancelButtonText: '{{ __('common.no') }}',
         }).then(result => {
           if (result.value) {
             axios({
               method: 'DELETE',
               url: $(this).attr('href'),
             }).then(response => {
               location.reload();
             });
           }
         });
       });
     });
   });
 </script>
@endpush
