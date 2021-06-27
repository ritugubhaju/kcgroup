<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="{{ route('dashboard.index') }}">
							<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="{{ route('dashboard.index') }}" class="active">
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->
						
						<li class="gui-folder">
							<a href="{{ route('menu.index') }}"> 
								<div class="gui-icon"><i class="md md-menu"></i></div>
								<span class="title">Menu</span>
							</a>
							
							<!-- <ul>
								<li><a href="{{ route('menu.index') }}" ><span class="title">View All Menus</span></a></li>
								
							</ul> -->
						</li>

						<li class="gui-folder">
							<a href="{{ route('slider.index') }}" >
								<div class="gui-icon"><i class="md md-image"></i></div>
								<span class="title">Sliders</span>
							</a>
							
				
						</li>

						<li class="gui-folder">
							<a href="{{ route('page.index') }}">
								<div class="gui-icon"><i class="md md-folder"></i></div>
								<span class="title">Pages</span>
							</a>
							
							
						</li>

						<!-- <li class="gui-folder">
							<a href="{{ route('event.index') }}">
								<div class="gui-icon"><i class="md md-event"></i></div>
								<span class="title">Events</span>
							</a>
							
							
						</li> -->

						<li class="gui-folder">
							<a href="{{ route('timeline.index') }}" >
								<div class="gui-icon"><i class="md md-image"></i></div>
								<span class="title">Timelines</span>
							</a>
						
	
						</li>
						<li class="gui-folder">
							<a href="{{ route('client.index') }}">
								<div class="gui-icon"><i class="md md-person"></i></div>
								<span class="title">Clients</span>
							</a>
							
						
						</li>

						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-image"></i></div>
								<span class="title">Gallery</span>
							</a>
							
							<ul>
								<li><a href="{{ route('gallery.index') }}" ><span class="title">View All Gallery</span></a></li>
								
							</ul>

							<ul>
								<li><a href="{{ route('album.index') }}" ><span class="title">View All Album</span></a></li>
								
							</ul>
						</li>

						<li class="gui-folder">
							<a href="{{ route('sector.index') }}">
								<div class="gui-icon"><i class="md md-folder"></i></div>
								<span class="title">Sectors</span>
							</a>
							
						

						</li>
						<li class="gui-folder">
							<a href="{{ route('document.index') }}">
								<div class="gui-icon"><i class="md md-folder"></i></div>
								<span class="title">Downloads</span>
							</a>
						

						</li>


						<li class="gui-folder">
							<a href="{{ route('project.index') }}">
								<div class="gui-icon"><i class="md md-folder"></i></div>
								<span class="title">Projects</span>
							</a>
							
					

						</li>

						<li class="gui-folder">
							<a href="{{ route('team.index') }}">
								<div class="gui-icon"><i class="md md-person"></i></div>
								<span class="title">Teams</span>
							</a>
							
					

						</li>
			
					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2021</span> <strong>KC Group</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->