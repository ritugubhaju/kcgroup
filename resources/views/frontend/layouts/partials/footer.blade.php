<!-- END SECTION CALL TO ACTION -->
{{-- <section class="bg_default small_pt small_pb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="text_white cta_section">
                    <div class="medium_divider d-block d-md-none"></div>
                    <div class="heading_s1 heading_light">
                        <h2>KC Group!</h2>
                    </div>
                    <p>If you are going to use a passage of embarrassing hidden in the middle of text</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-md-right">
                    <a href="#" class="btn btn-outline-white rounded-0">Get Started</a>
                </div>
                <div class="medium_divider d-block d-md-none"></div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END SECTION CALL TO ACTION -->
<!-- START FOOTER -->
<footer class="bg_blue_dark footer_dark">
    <div class="top_footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div >
                        <a href="{{route('homepage')}}">
                            <img class="footer_logo" class="bg-white" src="{{asset('assets/images/kclogo.png')}}">
                        </a> 
                    </div>
                    <!-- <p>Phasellus blandit massa enim. elit id varius nunc. Lorem ipsum dolor sit amet, consectetur industry.</p> -->
                    <ul >
                        <div class="blog_text">
                                <h4>KC Group</h4>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                        
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-6 mb-4 mb-lg-0">
                    <h6 class="widget_title">Quick Links</h6>
                    <ul class="list_none widget_links links_style1">
                        <li><a href="{{route('homepage')}}">Home</a></li>
                            <li><a href="{{url('about')}}">About</a></li>
                        <li><a href="{{url('gallery')}}">Gallery</a></li>
                        <li><a href="{{url('contact')}}">Contact</a></li>

                        <!--@foreach(menus() as $menu)-->
                        <!--    <li><a href="{{url($menu->url)}}">{{$menu->name}}</a></li>-->
                        <!--@endforeach-->
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-6 col-6 mb-4 mb-lg-0">
                <h6 class="widget_title">Contact Us</h6>
                <ul class="list_none social_icons social_white social_style1">
                        @if(setting('facebook') !=null)
                            <li><a href="{{setting('facebook')}}" class="socialfacebook"><i class="ion-social-facebook"></i></a></li>
                        @endif
                        @if(setting('twitter') !=null)
                            <li><a href="{{setting('twitter')}}" class="socialtwitter"><i class="ion-social-twitter"></i></a></li>
                        @endif
                        @if(setting('linkedin') !=null)
                            <li><a href="{{setting('linkedin')}}" class="sociallinkedin"><i class="ion-social-linkedin"></i></a></li>
                        @endif
                    </ul>

                    <ul class="mt-3 contact_info contact_info_light list_none">
                        <li>
                            <i class="fa fa-map-marker-alt "></i>
                            <address>{{setting('address')}}</address>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{setting('email')}}">{{setting('email')}}</a>
                        </li>
                        <li>
                            <i class="fa fa-mobile-alt"></i>
                                <a href="tel:{{setting('phone')}}">{{setting('phone')}}</a>
                        </li>
                    </ul>
                </div>
              
            </div>
        </div>
    </div>
    <div class="bottom_footer bg_blue_dark2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="copyright m-md-0 text-center text-md-left">© {{date('Y')}} All Rights Reserved by KC Group.</p>
                </div>
               
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
