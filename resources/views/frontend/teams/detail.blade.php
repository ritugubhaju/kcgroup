@extends ('frontend.layouts.app')
@section('content')

    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Teams</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('teams') }}">Teams</a></li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->

    <!-- START SECTION TEAMS -->
    <section class=" teams team">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1 text-center animation" data-animation="fadeInUp"
                         data-animation-delay="0.01s">
                            <h2>Our Teams</h4>
                    </div>
                </div>
            </div>
            @foreach($teams as $key => $team_list)
    
                @if($key == $loop->iteration)
                    {!! '<div class="row justify-content-center">' !!}
                @endif
                    @foreach($team_list as $team)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <div class="team_content team_box team_style2">
                                    <div class="team_image_wrap">
                                        <div class="team_img_1">
                                        <div class="team_img_2">
                                            <div class="team_img">
                                                <img src="{{asset($team->image_path)}}" alt="sps" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="team_title text-center">
                                        <h5><a href="#">{{$team->title}}</a></h5>
                                        <span>{{$team->position}}</span>
                                        <ul class="list_none">
                                            <li style="text-transform: lowercase!important;font-size: 15px;">{{strtolower($team->email)}}</li>
                                        </ul>
                                    </div>
                                </div>       
                            </div>
                    @endforeach
                @if($key == $loop->iteration)
                    {!! '</div>' !!}
                @endif

            @endforeach

            @if($hod)
                <div class="col-12">
                    <div class="heading_s1 text-center animation" data-animation="fadeInUp"
                        data-animation-delay="0.01s">
                        <h2>Head Of Department</h2>
                    </div>
                </div>
                @foreach($hod as $key=>$team_list)
                    @if($key == $loop->iteration)
                        {!! '<div class="row dasdas justify-content-center">' !!}
                    @endif
                    @foreach($team_list as $team)
                

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="team_content team_box team_style2">
                                <div class="team_image_wrap">
                                    <div class="team_img_1">
                                    <div class="team_img_2">
                                        <div class="team_img">
                                            <img src="{{asset($team->image_path)}}" alt="sps" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="team_title text-center">
                                    <h5><a href="#">{{$team->title}}</a></h5>
                                    <span>{{$team->position}}</span>
                                    <ul class="list_none">
                                        <li style="text-transform: lowercase!important;font-size: 15px;">{{strtolower($team->email)}}</li>
                                    </ul>
                                </div>
                            </div>       
                        </div>
                    @endforeach
                    @if($key == $loop->iteration)
                        {!! '</div>' !!}
                    @endif

                @endforeach
            @endif

            @if($bm)
                <div class="col-12">
                    <div class="heading_s1 text-center animation" data-animation="fadeInUp"
                        data-animation-delay="0.01s">
                        <h2>Branch Manager</h2>
                    </div>
                </div>
                @foreach($bm as $key=>$team_list)
                    @if($key == $loop->iteration)
                        {!! '<div class="row justify-content-center">' !!}
                    @endif
                    @foreach($team_list as $team)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="team_content team_box team_style2">
                                <div class="team_image_wrap">
                                    <div class="team_img_1">
                                    <div class="team_img_2">
                                        <div class="team_img">
                                            <img src="{{asset($team->image_path)}}" alt="sps" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="team_title text-center">
                                    <h5><a href="#">{{$team->title}}</a></h5>
                                    <span>{{$team->position}}</span>
                                    <ul class="list_none">
                                        <li style="text-transform: lowercase!important;font-size: 15px;">{{strtolower($team->email)}}</li>
                                    </ul>
                                </div>
                            </div>       
                        </div>
                    @endforeach
                    @if($key == $loop->iteration)
                        {!! '</div>' !!}
                    @endif

                @endforeach
            @endif
        </div>
    </section>
    <!-- END SECTION TEAMS -->
@endsection
