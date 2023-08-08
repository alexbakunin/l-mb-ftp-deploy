<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Популярные статьи</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                @foreach($posts as $post)
                <a href="{{ route('post', ['slug' => $post->slug]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="w-100 justify-content-between">
                        <img src="{{ $post->getImage() }}" alt="" class="img-fluid float-left">
                        <h5 class="mb-1">{{ $post->title }}</h5>
                        <small>{{ \Carbon\Carbon::make($post->created_at)->translatedFormat('d F Y') }}</small>
                    </div>
                </a>
                @endforeach
            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->
</div><!-- end sidebar -->
