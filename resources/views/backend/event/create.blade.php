@extends('backend.layouts.admin.admin')

@section('title', 'Event')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('event.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.event.partials.form',['header' => 'Create a event'])
            </form>
        </div>
    </section>
@stop


