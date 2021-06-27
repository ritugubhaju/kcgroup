@extends('backend.layouts.admin.admin')

@section('title', 'Video')

@section('content')
    <section>
         <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('video.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.video.partials.form',['header' => 'Add a video'])
            </form>
        </div>
    </section>
@stop


@push('styles')
    <link href="{{ asset('backend/assets/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/dropify/dropify.min.js') }}"></script>
@endpush
