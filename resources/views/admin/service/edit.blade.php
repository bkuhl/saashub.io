@extends('backend_master')

@section('title', 'Editing '.$service->name)

@section('content')
    <div class="mdl-grid" style="width: 900px;margin-top:6em">
        <div class="mdl-cell mdl-cell--4-col"></div>
        <div class="mdl-cell mdl-cell--4-col">
            <div style="float: right;">
                <form method="post" action="/admin/service/{{ $service->id }}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Delete</button>
                </form>
            </div>
            @include('partials.messages')
            <form method="post" action="/admin/service/{{ $service->id }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                <input type="hidden" name="_method" value="put"/>
                @include('admin.service.form')
                <h5>Meta data</h5>
                <ul>
                @foreach($service->metas as $meta)
                    <li>{{ $meta->label->name }}: {{ $meta->value }}</li>
                @endforeach
                </ul>
                <div style="text-align: center">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Save</button>
                </div>
            </form>
        </div>
        <div class="mdl-cell mdl-cell--4-col"></div>
    </div>
@endsection