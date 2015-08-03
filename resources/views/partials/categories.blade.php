<div class="quote_sections categories">
    <h3><span>Categories</span></h3>
    <ul class="fa-ul">
    @foreach($categories as $category)
        <li
        @if(isset($current) && $current == $category->slug)
        class="active"
        @endif>
            <i class="fa-li fa fa-caret-right grey2"></i>
            <a href="/browse/{{ $category->slug }}">{{ $category->name }} <span class="badge">{{ number_format($category->service_count) }}</span></a>
        </li>
    @endforeach
    </ul>
</div>