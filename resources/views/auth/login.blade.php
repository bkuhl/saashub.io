@extends('backend_master')

@section('title', 'Login')

@section('content')
    @include('partials.messages')
    <form method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="mdl-grid" style="margin-top:6em">
            <div class="mdl-cell mdl-cell--4-col"></div>
            <div class="mdl-cell mdl-cell--4-col">

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                    <input class="mdl-textfield__input" type="text" name="email" value="{!! old('email') !!}" autofocus/>
                    <label class="mdl-textfield__label" for="sample3">Email</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                    <input class="mdl-textfield__input"  type="password" name="password" autocomplete="off" />
                    <label class="mdl-textfield__label" for="sample3">Password</label>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Login</button>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col"></div>
        </div>
    </form>
@endsection