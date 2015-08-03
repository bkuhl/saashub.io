@extends('backend_master')

@section('title', 'New Category')

@section('content')
    @include('partials.messages')
    <form method="post" action="/admin/category">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="mdl-grid" style="margin-top:6em">
            <div class="mdl-cell mdl-cell--4-col"></div>
            <div class="mdl-cell mdl-cell--4-col">
                @include('admin.category.form')
                <h5>Meta Data</h5>
                <p>Easily comparable data between services, such as: amount of storage, # of users, etc.</p>
                <div class="mdl-grid">
                    @foreach(array_fill(0, 3, 1) as $idx => $val)
                    <div class="mdl-cell mdl-cell--12-col">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="label[{{ $idx }}]" value="{{ old('label['.$idx.']') }}"/>
                            <label class="mdl-textfield__label">Label</label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div style="text-align: center">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Create</button>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col"></div>
        </div>
    </form>
@endsection