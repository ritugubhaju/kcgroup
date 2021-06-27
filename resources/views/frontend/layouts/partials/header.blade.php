<!-- START HEADER -->
<header class="header_wrap dark_skin">
    <div class="top-header light_skin bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <ul class="contact_detail list_none text-center text-md-left">
                        <li><a href="{{setting('phone')}}"><i class="ti-mobile"></i>
                            +1 (695) 407-8269</a></li>
                        <li><a href="{{setting('email')}}"><i class="ti-email"></i>zyvad@mailinator.com</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-md-end justify-content-center mt-2 mt-md-0">
                        <ul class="list_none social_icons social_white text-center text-md-right">
                            <li><a href="{{setting('facebook')}}"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="{{setting('twitter')}}"><i class="ion-social-twitter"></i></a></li>
                          
                        </ul>
                      
                        <ul >
                            <a href="{{route('download')}}" class="btn btn-default btn-sm">Downloads</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{route('homepage')}}">
                <!-- <img class="logo_light" src="{{asset('assets/images/leclogo21.png')}}" alt="{{ config('app.name') }}"/>
                <img class="logo_dark" src="{{asset('assets/images/leclogo21.png')}}" alt="{{ config('app.name') }}"/> -->
                <img class="logo_dark" src="{{asset('assets/images/kclogo.png')}}"
                     alt="{{ config('app.name') }}"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="ion-android-menu"></span></button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @foreach(menus() as $menu)
                        <?php
                        $hasSub = !$menu->subMenus->isEmpty();
                        ?>
                        <li class="{{($hasSub) ? "dropdown" : ""}}">
                            <a class="{{($hasSub) ? "dropdown-toggle" : ""}} nav-link" href="{{ url($menu->url) }} "
                               data-toggle="{{($hasSub) ? "dropdown" : ""}}">
                                {{$menu->name}}
                            </a>
                            @if($hasSub)
                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach($menu->subMenus as $key => $sub)
                                            <li>
                                                <a class="dropdown-item nav-link nav_item"
                                                   href="{{url($sub->url)}}">{{ $sub->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- END HEADER --> 
