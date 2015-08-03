<div class="row">
    @foreach($services as $service)
        <div class="col-md-3">
            @include('partials.service')
        </div>
    @endforeach
</div>