@props([
    'tags' => []
])

@if(count($tags) > 0)
<section>
    <div class="wrapper">
        <div class="item tags">
        @foreach($tags as $tag)
        <a href="#">{{ $tag->tag_name }}</a>
        @endforeach 
        </div>
    </div>
</section>
@endif
