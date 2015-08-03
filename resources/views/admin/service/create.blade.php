@extends('backend_master')

@section('title', 'New Service')

@section('content')
    @include('partials.messages')
    <form method="post" action="/admin/service?categoryId={{ $_GET['categoryId'] }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="mdl-grid" style="margin-top:6em">
            <div class="mdl-cell mdl-cell--2-col"></div>
            <div class="mdl-cell mdl-cell--4-col">
                @include('admin.service.form')
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="file" name="logo" value=""/>
                    <label class="mdl-textfield__label">Logo</label>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col">
                <h5>Meta Data</h5>
                <p>Easily comparable data between services, such as: amount of storage, # of users, etc.</p>
                <div class="mdl-grid">
                    @foreach($category->labels as $label)
                        <div class="mdl-cell mdl-cell--12-col">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="label[{{ $label->id }}]" value="{{ old('label['.$label->id.']') }}"/>
                                <label class="mdl-textfield__label">{{ $label->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mdl-cell mdl-cell--2-col"></div>
            <div class="mdl-cell mdl-cell--12-col" style="text-align: center">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Create</button>
            </div>
        </div>
    </form>
@endsection