@extends ('frontend.layouts.app')
@section('content')

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
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

    <!-- START SECTION EVENT -->
    @if ($events->isNotEmpty())
        <section class="small_pt">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                            <div class="heading_s1 text-center">
                                <h2>Upcoming events</h2>
                            </div>
                          
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                   
                        @foreach ($events as $eventsData)
                            <div class="col-lg-4 col-sm-6">
                                <div class="content_box event_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                                    <div class="content_img radius_ltrt_10">
                                         <a href="{{ route('events.detail', $eventsData->slug) }}"><img src="{{ asset($eventsData->image_path) }}" alt="event_img1"/></a>
                                        <div class="event_date radius_all_5">
                                            <h5>  <span>{{$eventsData->event_date->format('d')}}</span> <span>{{$eventsData->event_date->format('M')}}</span></h5>
                                            
                                        </div>
                                    </div>
                                    <div class="content_desc">
                                        <h4 class="content_title"><a href="#"><span> {{ $eventsData->title }}</span></a></h4>
                                            <ul class="list_none content_meta">
                                                <li><i class="ti-user"></i> <a href="#" class="text_default">{{ $eventsData->meta_description }}</a></li>
                                            </ul>
                                            <span>{!! Str::limit($eventsData->content, 46) !!}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                  
                </div>
            
            </div>
        </section>
    @endif 
    <!-- START SECTION EVENT -->
@endsection