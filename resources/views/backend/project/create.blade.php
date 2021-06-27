@extends('backend.layouts.admin.admin')

@section('title', 'Project')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('project.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.project.partials.form',['header' => 'Create a Project'])
            </form>
        </div>
    </section>
@stop


