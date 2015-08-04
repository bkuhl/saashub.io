<div class="quote_sections categories">
    <h3><span>Categories</span></h3>
    <ul>
    @foreach($categories as $category)
        <li
        @if(isset($current) && $current == $category->slug)
        class="active"
        @endif>
            <a href="/browse/{{ $category->slug }}">{{ $category->name }}</a>
        </li>
    @endforeach
    </ul>
</div>