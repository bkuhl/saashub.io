<div class="tile tile-hot service-card">
    <img src="{{ $service->logo->url() }}"/>
    <h4><span>{{ $service->name }}</span></h4>
    @foreach($service->metas as $meta)
        <div>{{ $meta->label->name }}: {{ $meta->value }}</div>
    @endforeach
    <div>Category: <a href="/browse/{{ $service->category->slug }}">{{ $service->category->name }}</a></div>
    <br><a href="{{ $service->getRedirectUrl() }}" class="btn btn-danger">Check it out</a>
</div>
<div class="pad25"></div>