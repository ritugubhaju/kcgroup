@extends('backend.layouts.admin.admin')

@section('title', 'Client')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('client.update',$client->slug)}}"
                  method="POST" enctype="multipart/form-data" novalidate>
            @method('PUT')
            @include('backend.client.partials.form', ['header' => 'Edit client <span class="text-primary">('.($client->title).')</span>'])
            </form>
        </div>
</section>
@stop

