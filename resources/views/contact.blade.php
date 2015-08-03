@extends('master')

@section('title', 'Contact Us')
@section('nav', 'contact')
@section('content')
    <div class="container wrapper pad10">
        <div class="inner_content">
            @include('partials.messages')
            <div class="row pad10">
                <div class="col-sm-6 col-md-4">
                    <h3>
                        Do you have a question, comment or suggestion? Please let us know by filling out this brief form.
                    </h3>
                </div>

                <div class="col-sm-6 col-md-8">
                    <div class="contact_form">
                        <div id="note"></div>
                        <div id="fields">
                            <form method="post" id="ajax-contact-form">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <p class="form_info">name <span class="required">*</span></p>
                                <input class="col-xs-12 col-sm-12 col-md-8" type="text" name="name" value="{{ old('name') }}" autofocus>
                                <p class="form_info">email <span class="required">*</span></p>
                                <input class="col-xs-12 col-sm-12 col-md-8" type="email" name="email" value="{{ old('email') }}">
                                <p class="form_info">message</p>
                                <textarea name="message" class="col-xs-12 col-sm-12 col-md-12">{{ old('message') }}</textarea>
                                <div class="clear"></div>

                                <input type="submit" class="btn btn-danger btn-form marg-right5" value="submit">
                                <div class="clear pad45"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection