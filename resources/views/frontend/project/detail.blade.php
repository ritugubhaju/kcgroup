@extends ('frontend.layouts.app')
@section('content')

<!-- START PROJECT DETAIL -->
<section>
	<div class="container">
        <div class="row">
          @if($projects)
            <div class="col-lg-9">
                
                      <div class="single_course">
                          
                          <div class="course_img">
                              <a href="#">
                                  <img src="{{asset($projects->image_path)}}" alt="course_img_big">
                              </a>
                          
                          </div>

                          
                          
                          <div class="course_tabs">
                        <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link active" id="overview-tab1" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" id="curriculum-tab1" data-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">Curriculum</a>
                            </li>

                              <li class="nav-item">
                                <a class="nav-link" id="url-tab1" data-toggle="tab" href="#url" role="tab" aria-controls="url" aria-selected="false">URL Link</a>
                            </li>
                            
                          </ul>
                          <div class="tab-content">
                              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab1">
                                <div class="border radius_all_5 tab_box"> <p>Lorem Ipsu. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>
                              </div>
                              <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab1">
                                  <div id="accordion" class="accordion">
                                      <div class="card">
                                        <div class="card-header" id="heading-1-One">
                                          <h6 class="mb-0"> <a data-toggle="collapse" href="#collapse-1-One" aria-expanded="true" aria-controls="collapse-1-One">Leap into electronic typesetting <span class="item_meta duration">30 min</span></a></h6>
                                        </div>
                                        <div id="collapse-1-One" class="collapse show" aria-labelledby="heading-1-One" data-parent="#accordion">
                                          <div class="card-body">
                                            <p>Lorem Ipsu. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="card">
                                        <div class="card-header" id="heading-1-Three">
                                          <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse-1-Three" aria-expanded="false" aria-controls="collapse-1-Three">took a galley of type <span class="item_meta duration">45 min</span></a> </h6>
                                        </div>
                                        <div id="collapse-1-Three" class="collapse" aria-labelledby="heading-1-Three" data-parent="#accordion">
                                          <div class="card-body">
                                            <p>Lorem Ipsu. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              
                              
                                <div class="tab-pane fade" id="url" role="tabpanel" aria-labelledby="url-tab1">
                                  <iframe width="560" height="315" src="{{$projects->link_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                            
                            
                              
                          </div>
                      </div>
                          
                      
            </div>
          @endif

           
            
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
</section>
<!-- END PROJECT DETAIL -->



@endsection