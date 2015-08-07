@extends('backend_master')

@section('title', 'Dashboard')

@section('content')
    @include('partials.messages')

    <div style="width: 500px; margin: 2em auto 0 auto">
        <div style="text-align: right">
            <a href="/admin/category/create" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">New Category</a>
        </div>
        <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width: 100%">
            <tbody>
            @foreach(\SaaSHub\Category::all() as $category)
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">
                        <a href="/admin/category/{{ $category->id }}/edit"><strong>{{ $category->name }}</strong></a>
                        @if($category->services()->count() > 0)
                            <ul>
                            @foreach($category->services()->orderBy('name', 'ASC')->get() as $service)
                                <li>
                                    <a href="/admin/service/{{ $service->id }}/edit">{{ $service->name }}</a>
                                </li>
                            @endforeach
                            </ul>
                        @endif
                    </td>
                    <td class="mdl-data-table__cell--numeric">
                        {{ number_format($category->service_count) }} services &middot;
                        <a href="/admin/service/create?categoryId={{ $category->id }}">New Service</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection