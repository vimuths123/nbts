@extends('voyager-frontend::layouts.default')
@section('meta_title', $post->title)
@section('meta_description', $post->meta_description)
@section('page_title', $post->title)
@section('page_subtitle', 'Posted // ' . $post->created_at->format('jS M. Y'))
@section('page_banner', imageUrl($post->image))

@section('content')


<section id="event-single" class="event-single-content mb30">
    <div class="container">
        <div class="row">
            <div class="event-single-content-pic-text">
                <div class="event-single-pic">
                    @if($post->image)
                    <a href="{{ route('voyager-blog.blog.post', ['slug' => $post->slug]) }}">
                        <img src="{{ imageUrl($post->image, 260, 175) }}" style="width: 100%">
                    </a>
                    @else
<!--                    <a href="{{ route('voyager-blog.blog.post', ['slug' => $post->slug]) }}">
                        <img src="/theme/img/cause-details-2.jpg" alt="image">
                    </a>-->
                    @endif
                </div>
                <div class="event-single-text">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="event-single-head">
                                <div class="blog-head-title pt15 mb10">
                                    <h2 class="black"><a>{!! $post->title !!}</a></h2>
                                </div>

                                {!! $post->body !!}
                            </div>
<!--                            <div class="comment-form mt25">
                                <div class="send-button text-uppercase">
                                    <button type="submit" value="Submit">attend now</button> 
                                </div>
                            </div>-->
                        </div>
                        <!-- /col-md-8 -->

                        <div class="col-sm-4">
                            <div class="event-single-time-location clearfix mt25 pt40">
                                <div class="event-single-time">
                                    <div class="side-bar-title pb20">
                                        <h3>Details</h3>
                                    </div>
                                    <div class="event-single-time-date">
                                        <span class="me-time">Created At: {{date('d F Y g:i A', strtotime($post->created_at))}}</span>
                                        <span class="me-time">Category: {{ $post->category->name }}</span>
                                        <!--<span class="me-time">Time: {{date('', strtotime($post->created_at))}}</span>-->
                                    </div>
                                </div>
                            </div>

<!--                            <div class="event-single-time-location clearfix mt25 pt40">
                                <div class="event-single-time">
                                    <div class="side-bar-title pb20">
                                        <h3>Event Location</h3>
                                    </div>
                                    <div class="event-single-time-date">
                                        <span class="me-time">Place: New York,USA</span>
                                        <span class="me-time">Price: $100</span>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <!-- /col-sm-4 -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /single-text -->
            </div>
        </div>
    </div>
</section>


@endsection
