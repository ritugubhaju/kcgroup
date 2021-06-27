@extends('backend.layouts.admin.admin')

@section('title', 'Document')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('document.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.document.partials.form',['header' => 'Create a document'])
            </form>
        </div>
    </section>
@stop


{{-- @push('styles')
    <link href="{{ asset('backend/assets/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dropify.min.js') }}"></script>
@endpush --}}
