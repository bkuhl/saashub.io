<div class="tile tile-hot service-card">
    <img src="{{ $service->logo->url() }}"/>
    <h4><span>{{ $service->name }}</span></h4>
    <div class="description">
        <div>Category: <a href="/browse/{{ $service->category->slug }}">{{ $service->category->name }}</a></div>
        @foreach($service->metas as $meta)
            <div>{{ $meta->label->name }}: {{ $meta->value }}</div>
        @endforeach
    </div>
    <a href="{{ $service->getRedirectUrl() }}" class="btn btn-danger">Check it out</a>
</div>
<div class="pad25"></div>