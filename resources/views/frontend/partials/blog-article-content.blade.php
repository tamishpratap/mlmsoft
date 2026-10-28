@foreach ($article['sections'] as $section)
    <section class="blog-content-section">
        <div class="blog-section-heading">
            <span class="blog-section-marker"></span>
            <h2>{{ $section['heading'] }}</h2>
        </div>

        @foreach ($section['blocks'] as $block)
            @if ($block['type'] === 'subheading')
                <h3>{{ $block['text'] }}</h3>
            @elseif ($block['type'] === 'paragraph')
                <p>{{ $block['text'] }}</p>
            @elseif ($block['type'] === 'list')
                <ul class="blog-content-list">
                    @foreach ($block['items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @elseif ($block['type'] === 'image')
                <figure class="blog-inline-media blog-inline-media--{{ $block['variant'] }}">
                    <img src="{{ $block['src'] }}" alt="{{ $block['alt'] }}" loading="lazy">
                </figure>
            @endif
        @endforeach
    </section>
@endforeach
