@extends('backend.layouts.admin.admin')
@section('title', 'Sector')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('sector.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.sector.partials.form',['header' => 'Create a sector'])
            </form>
        </div>
    </section>
@stop


