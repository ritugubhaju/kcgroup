@extends('backend.layouts.admin.admin')

@section('title', 'project')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('project.update',$project->slug)}}"
                  method="POST" enctype="multipart/form-data" novalidate>
            @method('PUT')
            @include('backend.project.partials.form', ['header' => 'Edit project <span class="text-primary">('.($project->title).')</span>'])
            </form>
        </div>
</section>
@stop

