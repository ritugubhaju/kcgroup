@extends('frontend.layouts.app')

@section('content')

    <!-- START SECTION BANNER -->
    
   <!--Carousel Wrapper-->
<!--Carousel Wrapper-->
<div id="video-carousel-example2" class="carousel slide carousel-fade banner-style-1" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#video-carousel-example2" data-slide-to="0" ></li>
      <li data-target="#video-carousel-example2" data-slide-to="1"></li>
      <li data-target="#video-carousel-example2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      @foreach($sliders as $slide)
  
      <div class="carousel-item @if ($loop->first) active @endif">
        <!--Mask color-->
        <div class="view">
          <!--Video source-->
          <video class="video-fluid" autoplay loop muted width="100%">
            <source src="{{asset($slide->image_path)}}" type="video/mp4" width="100%"/>
          </video>
          <div class="mask rgba-indigo-light"></div>
        </div>
  
        <!--Caption-->
        <div class="carousel-caption">
          <div class="animated fadeInDown">
            <h3 class="h3-responsive">{{$slide->title}}</h3>
          </div>
        </div>
        <!--Caption-->
      </div>
      @endforeach
  
  
  
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <!--Carousel Wrapper-->

    <section class="p-0 overlap_box" >
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12 animation">
                      
                            <div class="cat_overlap_box course_categories carousel_slider owl-carousel owl-theme nav_style1" data-margin="15" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "576":{"items": "3"}, "1000":{"items": "4"}, "1199":{"items": "5"}}'>
                            @foreach($clients as $client)
                                <div class="item">
                                    <div class="single_categories">
                                        <a href="#" class="bg-white"><img src="{{asset($client->company_path)}}" height="130px" width="70%"/></a>
                                    </div>
                                </div>
                            @endforeach
                            
                            </div>
                    </div>
                </div>
            </div>
    </section>

    
<!-- START SECTION ABOUT -->
<section class="small_pt small_pb overflow-hidden ">
	<div class="container-fluid p-0 ">
    	<div class="row no-gutters align-items-center">
        	<div class="col-md-6">
            	<div class="box_shadow1 bg-white overlap_section padding_eight_all">
                	<div class="animation" data-animation="fadeInLeft" data-animation-delay="0.02s">
                        <div class="heading_s1"> 
                          <h2>About Us</h2>
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        <ul class="list_none list_item">
                        	<li>
                            	<div class="counter_content">
                                    <h3 class="h1 text_danger"><span class="counter">6</span></h3>
                                    <h6>Sectors</h6>
                                </div>
                            </li>
                            <li>
                            	<div class="counter_content">
                                    <h3 class="h1 text_light_green"><span class="counter">20</span></h3>
                                    <h6>Clients</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        	<div class="col-md-6">
            	<div class="animation" data-animation="fadeInRight" data-animation-delay="0.03s">
                	<div class="overlay_bg_30 about_img z_index_minus1">	
                    	<img class="w-100" src="assets/images/about_bg.jpg" alt="about_img"/>
                    </div>
                	<a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="video_popup video_play">
                    	<span class="ripple"><i class="ion-play ml-1"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION ABOUT -->

<!-- START SECTION COUNTER -->
<section class="parallax_bg overlay_bg_blue_70" data-parallax-bg-image="assets/images/counter_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="counter_icon">
                    	<img src="assets/images/counter_icon1.png" alt="counter_icon1" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">6</span>+</h3>
                        <p>Sectors</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                    <div class="counter_icon">
                    	<img src="assets/images/counter_icon2.png" alt="counter_icon2" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">50</span></h3>
                        <p>Teams</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                    <div class="counter_icon">
                    	<img src="assets/images/counter_icon3.png" alt="counter_icon3" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">30</span>+</h3>
                        <p>Clients</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.05s">
                	<div class="counter_icon">
                    	<img src="assets/images/counter_icon4.png" alt="counter_icon4" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">10</span>+</h3>
                        <p>Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION COUNTER -->



     <!-- START SECTION PROJECT -->
     @if ($projects->isNotEmpty())
        <section class="small_pt">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                            <div class="heading_s1 text-center">
                                <h2>Projects</h2>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
       
      
            <div class="container">	
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="list_none grid_filter">
                            <li><a href="#" class="current" data-filter="*">all</a></li>
                            <li><a href="#" data-filter=".Ongoing">Ongoing</a></li>
                            <li><a href="#" data-filter=".Completed">Completed</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="grid_container gutter_medium grid_col3">
                            <li class="grid-sizer"></li>
                            <!-- START PORTFOLIO ITEM -->
                            @foreach ($onlineprojects as $projectsData)
                            <li class="grid_item Ongoing">
                                <div class="gallery_item">
                                    <div class="content_box event_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                                        <div class="content_img radius_ltrt_10">
                                             <a href="{{ route('projects.detail', $projectsData->slug) }}"><img src="{{ asset($projectsData->image_path) }}" alt="event_img1"/></a>
                                            <div class="event_date radius_all_5">
                                                  
                                                 
                                                     @if($projectsData->type =='Completed')
                                                        <span style="background-color: #419645">{{$projectsData->type ? 'Completed' : 'Ongoing'}}</span>
                                                    @elseif($projectsData->type =='Ongoing')
                                                        <span  style="background-color: #f44336">{{$projectsData->type ? 'Ongoing' : 'Completed'}}</span>
                                                    @endif 
                                                 
                                            </div>
                                        </div>
                                        <div class="content_desc">
                                            <h4 class="content_title"><a href="#"><span> {{ $projectsData->title }}</span></a></h4>
                                               
                                                <span>{!! Str::limit($projectsData->content, 200) !!}</span>
                                            </h4>
                                        </div>
                                    </div>
                                   
                                </div>
                            </li>
                            @endforeach
                            <!-- END PORTFOLIO ITEM -->
                            <!-- START PORTFOLIO ITEM -->
                            <li class="grid-sizer"></li>
                            <!-- START PORTFOLIO ITEM -->
                            @foreach ($completedprojects as $projectsData)
                            <li class="grid_item Completed">
                                <div class="gallery_item">
                                    <div class="content_box event_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                                        <div class="content_img radius_ltrt_10">
                                             <a href="{{ route('projects.detail', $projectsData->slug) }}"><img src="{{ asset($projectsData->image_path) }}" alt="event_img1"/></a>
                                            <div class="event_date radius_all_5">
                                                  
                                                 
                                                     @if($projectsData->type =='Completed')
                                                        <span style="background-color: #419645">{{$projectsData->type ? 'Completed' : 'Ongoing'}}</span>
                                                    @elseif($projectsData->type =='Ongoing')
                                                        <span  style="background-color: #f44336">{{$projectsData->type ? 'Ongoing' : 'Completed'}}</span>
                                                    @endif 
                                                 
                                            </div>
                                        </div>
                                        <div class="content_desc">
                                            <h4 class="content_title"><a href="#"><span> {{ $projectsData->title }}</span></a></h4>
                                               
                                                <span>{!! Str::limit($projectsData->content, 200) !!}</span>
                                            </h4>
                                        </div>
                                    </div>
                                   
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif 
    <!-- START SECTION PROJECT -->
    
   

    <!-- START SECTION TIMELINE -->
    @if($timelines->isNotEmpty())
        <section class="timeline pt-5" style="background-color: #F7F7F7;padding-bottom: 0px!important;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="heading_s1 text-center">
                            <h2>Our Timeline</h2>
                        </div>
                        
                        <div class="small_divider"></div>
                    </div>
                </div>

                <div class="timeline-container">
                        <div class="timeline timeline-1">
                            @foreach($timelines as $timelinesData)
                                        <div data-time="{{$timelinesData->timeline_date->format('Y')}}">
                                            <div class="timeline-visual">
                                            <img src="{{asset($timelinesData->image_path)}}" alt="">
                                            </div>
                                            <div class="timeline-detail">
                                                <ul class="timeline-detail-list">
                                                    <span>{{$timelinesData->title}}</span>
                                                    <span>{!! $timelinesData->content !!}</span>
                                                </ul>
                                            </div>
                                        </div> 
                             @endforeach
                        </div>
                </div><!-- /.timeline-container -->
               

            </div>

            </div>
        </section>
    @endif
    <!-- END SECTION TIMELINE -->

    <!-- START SECTION CLIENT'S SAYS -->
    <!--<section >-->
    <!--        <div class="container">-->
    <!--            <div class="row justify-content-center">-->
    <!--                <div class="col-xl-6 col-lg-8">-->
    <!--                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">-->
    <!--                        <div class="heading_s1 text-center">-->
    <!--                            <h2>Client's Say!</h2>-->
    <!--                        </div>-->
    
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="row justify-content-center">-->
    <!--                <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.02s">-->
    <!--                    <div class="testimonial_slider testimonial_style1 carousel_slider owl-carousel owl-theme" data-margin="30" data-loop="true" data-autoplay="true" data-dots="false" data-responsive='{"0":{"items": "1"}, "576":{"items": "2"}, "1199":{"items": "2"}}'>-->
    <!--                         @foreach($clients as $client)-->
    <!--                            <div class="testimonial_box">-->
    <!--                                <div class="testimonial_img">-->
    <!--                                    <img class="radius_all_5" src="{{asset($client->image_path)}}" alt="client">-->
    <!--                                </div>-->
    <!--                                <div class="testi_meta">-->
    <!--                                    <div class="testi_user">-->
    <!--                                         <span>{{$client->title}}</span>-->
    <!--                                        <span class="text_default">{{$client->position}}</span>-->
    <!--                                    </div>-->
    <!--                                    <div class="testi_desc">-->
    <!--                                         <span> {!! Str::limit($client->content, 200) !!} </span>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        @endforeach-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--</section>-->
    <!-- END SECTION CLIENT'S SAYS -->

 
@stop