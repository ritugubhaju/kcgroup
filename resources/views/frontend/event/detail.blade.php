@extends ('frontend.layouts.app')
@section('content')

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{ asset('assets/images/about_bg.jpg') }}">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title">
            		<h1>Events</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('events') }}">Events</a>
                    </li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION COURSE DETAIL -->

<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                @if($events)
                        <div class="single_event px-4 pb-4">
                            @if($events->image)
                                <div class="content_img">
                                    <a href="#">
                                        <img src="{{asset($events->image_path)}}" alt="{{$events->title}}">
                                    </a>
                                </div>
                                @if(!empty($events->event_date))
                                    <div class="event_date radius_all_5">
                        
                                        <h5> <span>{{$events->event_date->format('d')}}</span><span>{{$events->event_date->format('M')}}</span> </h5>
                                    
                                    </div>
                                @endif
                            @endif
                            <div class="event_title">
                                <div class="row align-items-end">
                                    <div class="col-12">
                                        <h2>{{$events->title}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="entry_content">
                                {!! $events->content !!}
                            </div>
                        </div>
                </div>
                @endif

                <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                    <div class="sidebar">
                        @if($events)
                            <div class="widget widget_recent_post">
                                <h5 class="widget_title">Recent Post</h5>
                                <ul class="recent_post border_bottom_dash list_none">
                                    @foreach($eventses as $events)
                                        <li>
                                            <div class="post_footer">
                                                <div class="post_img">
                                                    <a href="{{route('events.detail',$events->slug)}}"><img src="{{asset($events->thumbnail_path)}}"
                                                                     alt="{{$events->title}}"></a>
                                                </div>
                                                <div class="post_content">
                                                    <h6><a href="{{route('events.detail',$events->slug)}}">{{$events->title}}</a></h6>
                                                    @if(!empty($events->events_date))
                                                        <div class="event_date radius_all_5">
                                                            <h5> 
                                                                <span>{{$events->events_date->format('d')}}</span> 
                                                                <span>{{$events->events_date->format('M')}}</span>
                                                            
                                                            </h5>
                                                
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- END SECTION COURSE DETAIL -->

@endsection