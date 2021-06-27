@extends('backend.layouts.admin.admin')

@section('title', 'sector')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('sector.update',$sector->slug)}}"
                  method="POST" enctype="multipart/form-data" novalidate>
            @method('PUT')
            @include('backend.sector.partials.form', ['header' => 'Edit sector <span class="text-primary">('.($sector->title).')</span>'])
            </form>
        </div>
</section>
@stop

