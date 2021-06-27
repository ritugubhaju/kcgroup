@extends ('frontend.layouts.app')
@section('content')

    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>About Us</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('about') }}">About us</a></li>
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
                    <div class="single_post">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{asset('assets/images/about_bg.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="single_post_content">
                            <div class="blog_text">
                                <h4>KC Group</h4>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                         
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                    <div class="sidebar">

                            <div class="widget widget_recent_post ">
                                <h5 class="widget_title">Sectors</h5>

                                <ul lass="recent_post border_bottom_dash list_none">
                                    @foreach($sectors as $sector) 
                                        <li>
                                            <div class="post_footer mb-3">
                                                <div class="post_img">
                                                    <a href="{{route('sectors.detail',$sector->slug)}}"><img src="{{asset($sector->thumbnail_path)}}"
                                                                     alt="{{$sector->title}}"></a>
                                                </div>
                                                <div class="post_content">
                                                    <h6><a href="{{route('sectors.detail',$sector->slug)}}">{{$sector->title}}</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                        
                                </ul>
                            </div>
                 
                            <div class="widget widget_recent_post mt-5 ">
                                <h5 class="widget_title">Recent Projects</h5>
                                <ul class="recent_post border_bottom_dash list_none">
                                    
                                     @foreach($projectses as $projects)
                                        <li>
                                            <div class="post_footer">
                                                <div class="post_img">
                                                    <a href="{{route('projects.detail',$projects->slug)}}"><img src="{{asset($projects->thumbnail_path)}}"
                                                                    ></a>
                                                </div>
                                                <div class="post_content">
                                                    <h6><a href="{{route('projects.detail',$projects->slug)}}">{{$projects->title}}</a></h6>
                                                    @if(!empty($events->events_date))
                                                    <span class="post_date">{{$events->events_date->format('M d, Y')}}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COURSE DETAIL -->

@stop