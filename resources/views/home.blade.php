@extends('master')

@section('title', 'Free Tier')

@section('content')
    <div id="banner">
        <div class="container intro_wrapper">
            <div class="inner_content">

                <!--welcome-->
                <div class="welcome_index animated fadeInDown">
                    Whether it's for a side project or just an experiment, services are always better when they're <span>free</span>
                </div>
                <!--//welcome-->
            </div>
        </div>
    </div>
    <div class="container wrapper">
        <div class="inner_content">
            <div class="row pad30">
                @foreach($popularServices as $service)
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        @include('partials.service-card')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection