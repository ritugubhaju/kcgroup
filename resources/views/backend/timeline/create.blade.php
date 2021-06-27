@extends('backend.layouts.admin.admin')

@section('title', ' Timeline')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('timeline.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.timeline.partials.form',['header' => 'Create a timeline'])
            </form>
        </div>
    </section>
@stop


@push('styles')
    <link href="{{ asset('../backend/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('../backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('../backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('../backend/js/libs/dropify/dropify.min.js') }}"></script>
@endpush
