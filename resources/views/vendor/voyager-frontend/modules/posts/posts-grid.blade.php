<section id="page-head" class="page-head-section">
    <div class="page-head-overlay">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <div class="page-head-style">
                        <img src="/theme/img/page-head-style.png" alt="image">
                    </div>
                    <div class="page-head-title text-uppercase">
                        <h2>Blog Posts</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<div class="vspace-2"></div>-->

<section id="event" class="event-list">
    <div class="container">
        <div class="row section-content">
            <div class="event-list-content">
                <div class="row">
                    @empty($posts)
                    <p>There are currently no posts.</p>
                    @else
                    @foreach($posts as $post)
                    <div class="col-sm-4">
                        <div class="event-list-item colmd4">
                            <div class="event-list-pic">
                                @if($post->image)
                                <a href="{{ route('voyager-blog.blog.post', ['slug' => $post->slug]) }}">
                                    <img src="{{ imageUrl($post->image, 260, 175) }}" style="width: 100%">
                                </a>
                                @else
                                <a href="{{ route('voyager-blog.blog.post', ['slug' => $post->slug]) }}">
                                    <img src="/theme/img/blog-pic-1.jpg" alt="image">
                                </a>
                                @endif
                            </div>
                            <div class="event-text clearfix ">
                                <div class="blog-head-title pt15">
                                    <h2 class="black">
                                        <a href="{{ route('voyager-blog.blog.post', ['slug' => $post->slug]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                                </div>
                                <div class="event-location mt10">
                                    <div class="way-help-text-content pull-left">
                                        @if ($post->excerpt)
                                            <p>{{ Illuminate\Support\Str::limit($post->excerpt, 50, '&hellip;') }}</p>
                                        @endif
                                    </div>
                                    <div class="blog-button text-uppercase pull-right mt25 mr15">
                                        <a href="{{ route('voyager-blog.blog.post', ['slug' => $post->slug]) }}">read more <span class="arrow-right-btn ti-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col-sm-4 -->
                    @endforeach
                    @endempty
                </div>
            </div>
        </div>
    </div>
</section>


