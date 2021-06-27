@extends('backend.layouts.admin.admin')

@section('title', 'Client')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('client.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.client.partials.form',['header' => 'Create client'])
            </form>
        </div>
    </section>
@stop


