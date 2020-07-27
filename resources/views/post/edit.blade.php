@extends('layouts.dashboard')

@section('page-title', __('page.edit_post'))

@section('content')
 {{ Form::open([
    'route'  => ['posts.update', $post],
    'method' => 'PUT',
    'id'     => 'post',
 ]) }}

 <div class="row mt-3">
  <div class="col-md-9">
   <div class="card">
    <div class="card-body">
     @validation

     <div class="form-group mb-3">
      <input type="text" class="form-control" name="title" placeholder="{{ __('placeholder.add_post_title') }}" value="{{ old('title', $post->title) }}" autocomplete="off">
     </div>

     {{ Form::hidden('content') }}

     <div id="bubble-editor" style="height: 500px;">
      {!! old('content', $post->content) !!}
     </div>
    </div>
   </div>
  </div>

  <div class="col-md-3">
   <div class="card">
    <div class="card-body">
     <div class="form-group row mb-2">
      <label for="status" class="col-3 col-form-label">@lang('label.status')</label>

      <div class="col-9">
       {{ Form::select('status', [
        'published' => __('common.publish'),
        'draft'     => __('common.draft'),
       ], old('status', $post->status), [
        'class' => 'form-control custom-select',
       ]) }}
      </div>
     </div>

     <div class="form-group mb-0 justify-content-end row">
      <div class="col-9">
       <button type="submit" class="btn btn-info waves-effect waves-light">@lang('common.save')</button>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

 {{ Form::close() }}
@endsection

@push('script')
 <script>
   $(document).ready(function () {
     var quill = new Quill('#bubble-editor', {
       modules: {
         toolbar: [
           [{ 'size': ['small', false, 'large', 'huge'] }],
           [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
           ['bold', 'italic'],
           [{ 'align': [] }],
           ['link', 'blockquote', 'code-block'],
           [{ list: 'ordered' }, { list: 'bullet' }],
         ],
       },
       theme: 'snow',
     });

     const $post = $('#post');

     if ($post.length > 0) {
       $post.submit(function (e) {
         const $content = $('input[name="content"]');

         $content.val(quill.root.innerHTML);
       });
     }
   });
 </script>
@endpush
