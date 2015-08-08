@extends('master')

@section('title', $category->name.' Services')

@section('meta')
    <meta name="description" content="{{ $category->name }} SaaS products"/>
@endsection

@section('content')
    <div class="container wrapper">
        <div class="inner_content">
            <div class="row pad30">
                <div class="col-sm-4 col-md-3">
                    @include('partials.categories', [
                        'current' => $category->slug
                    ])
                </div>

                <div class="col-sm-8 col-md-9">
                    <h1 class="category-title">{{ $category->name }} Services</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="25%"></th>
                                @foreach($category->labels as $label)
                                    <th class="text-center">{{ $label->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    <a href="{{ $service->getRedirectUrl() }}">
                                        <strong class="text-danger">{{ $service->name }}</strong>
                                    </a>
                                </td>
                                @foreach($service->metas as $meta)
                                <td class="text-center">{{ $meta->value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="strip">
        <h3 class="center about_strip">
            If you know of an excellent service that offers an always free account we'd love to hear about it!
        </h3>
        <div class="pad15">
            <a href="/contact" class="btn btn-danger btn-lg">Recommend a service</a>
        </div>
    </div>
@endsection