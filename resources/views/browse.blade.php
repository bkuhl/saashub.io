@extends('master')

@section('title', 'Browse Services')

@section('content')
    <div class="container wrapper">
        <div class="inner_content">
            <div class="row pad30">
                <div class="col-md-3 col-sm-4">
                    @include('partials.categories')
                </div>

                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        @foreach($popularServices as $service)
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                @include('partials.service-card')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection