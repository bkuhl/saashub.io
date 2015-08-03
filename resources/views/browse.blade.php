@extends('master')

@section('title', 'Browse Services')

@section('content')
    <div class="container wrapper">
        <div class="inner_content">
            <div class="row pad30">
                <div class="col-sm-4 col-md-3">
                    @include('partials.categories')
                </div>

                <div class="col-sm-8 col-md-9">
                    @include('partials.most-popular')
                </div>
            </div>
        </div>
    </div>
@endsection