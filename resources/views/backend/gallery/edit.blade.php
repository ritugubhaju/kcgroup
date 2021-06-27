@extends('backend.layouts.admin.admin')

@section('title', 'Gallery')

@section('content')
    <section>
    <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('gallery.update',$gallery->slug)}}"
                  method="POST" enctype="multipart/form-data" novalidate>
            @method('PUT')
            @include('backend.gallery.partials.form', ['header' => 'Edit gallery <span class="text-primary">('.($gallery->title).')</span>'])
            </form>
        </div>
    </section>
@stop

@push('styles')
    <link href="{{ asset('backend/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/dropify/dropify.min.js') }}"></script>
@endpush