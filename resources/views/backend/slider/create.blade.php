@extends('backend.layouts.admin.admin')

@section('title', 'Slider')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.slider.partials.form',['header' => 'Create a slider'])
            </form>
        </div>
    </section>
@stop

