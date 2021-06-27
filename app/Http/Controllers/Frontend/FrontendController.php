<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMailNotifiable;
use App\Mail\SendContactInfo;
use App\Models\Album\Album;
use App\Models\Menu\Menu;
use App\Models\Menu\SubMenu;
use App\Models\Client\Client;
use App\Models\Document\Document;
use App\Models\Event\Event;
use App\Models\Gallery\Gallery;
use App\Models\Team\Team;
use App\Models\Page\Page;
use App\Models\Project\Project;
use App\Models\Sector\Sector;
use App\Models\Slider\Slider;
use App\Models\Timeline\Timeline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{


    public function homepage()
    {
        $projects = Project::where('is_published', 1)->where('is_featured', 1)->get();
        $completedprojects = Project::where('type', 'Completed')->where('is_featured', 1)->take(3)->get();
        $onlineprojects = Project::where('type', 'Ongoing')->where('is_featured', 1)->take(3)->get();
        $sectors = Sector::where('is_published', 1)->where('is_featured', 1)->get();
        $albums = Album::where('is_featured', 1)->where('is_published', 1)->get();
        $clients = Client::where('is_featured', 1)->where('is_published', 1)->get();
        
        $sliders = Slider::where('is_published',0)->get();
        $menus = Menu::where('is_published',0)->get();
        $documents = Document::where('is_published', 1)->get();
        $timelines = Timeline::where('is_published', 1)->orderBy('timeline_date','asc')->get();
        return view('frontend.home', compact( 'menus','sectors','sliders', 'documents', 'projects', 'clients', 'albums', 'timelines','completedprojects','onlineprojects'));
    }

    public function page($slug = null)
    {
        
        if ($slug) {
            
            $page = Page::whereSlug($slug)->whereIsPublished(1)->first();

            if ($page == null) {
                return view('frontend.errors.404');
            }

            if ($page) {
                $pages = Page::whereIsPublished(1)->whereIsPrimary(0)->whereNotIn('id', [$page->id])->take(10)->inRandomOrder()->get();
                if ($pages) {
                    return view('frontend.page', compact('page', 'pages'));
                }
            } else {
                return view('frontend.errors.404');
            }
        }
    }
    public function about(Sector $sectors, Project $projects)
    {
        $projectses = Project::where('is_published', 1)->take(3)->get();
        $sectors = Sector::where('is_published', 1)->take(3)->get();
        return view('frontend.about.about', compact('sectors','projectses'));
    }

    public function projectsList()
    {
        $projects = Project::where('is_published', 1)->latest()->take(6)->get();
        $completedprojects = Project::where('type', 'Completed')->take(3)->get();
        $onlineprojects = Project::where('type', 'Ongoing')->take(3)->get();
        return view('frontend.project.index', compact('projects','completedprojects','onlineprojects'));
    }

   

    public function projectsDetail(Project $projects){
        $completedprojects = Project::where('type', 'Completed')->take(3)->get();
        $onlineprojects = Project::where('type', 'Ongoing')->take(3)->get();
        $sectors = Sector::where('is_published', 1)->take(3)->get();
        $projectses = Project::where('is_published', 1)->take(2)->get();
        return view('frontend.project.detail', compact('projects','projectses','onlineprojects','completedprojects','sectors'));

    }

    public function gallery()
    {
        $albums = Album::where('is_published', 1)->latest()->get();
        $galleries = Gallery::where('is_published', 1)->latest()->get();
        return view('frontend.gallery.index', compact('galleries', 'albums'));
    }

    public function sectorsList()
    {
        $sectors = Sector::where('is_published', 1)->get();
        return view('frontend.sector.index', compact('sectors'));
    }

    public function sectorsDetail(Sector $sectors, Client $clients, Project $projects)
    {
        $projects = Project::where('is_published', 1)->where('sector_id',$sectors->id)->get();
        $clients = Client::where('is_published', 1)->where('sector_id',$sectors->id)->get();
        return view('frontend.sector.detail', compact('sectors', 'clients','projects'));
    }

    public function timelime(Timeline $timelines)
    {
        $timelineses = Timeline::where('is_published', 1)->whereNotIn('id', [$timelines->id])->get();
        return view('frontend.timelime.timeline' , compact('timelines', 'timelineses'));
    }

    public function downloads()
    {
        $downloads = Document::where('is_published', 1)->orderBy('created_at', 'desc')->get();
        return view('frontend.download.index', compact('downloads'));
    }

    public function contact()
    {
        return view('frontend.contact.contact');
    }

    
    public function faq()
    {
        return view('frontend.faq');
    }


    public function sendcontact(Request $request)
    {
        $data = $request->all();
        //dd($request->all());
        Mail::to('ritu.gubhaju20@gmail.com')->send(new SendContactInfo($data));
        return redirect()->back()->withSuccess(trans('Contact Inquiry Send Successfully'));
    }

    public function teams($team = null)
    {

        $bm = '';
        $hod = '';
        if ($team == 'management-team') {
            $teams = Team::whereIsPublished(1)->where('view', 'like', '%' . $team . '%')->where('content', null)->orderBy('order', 'asc')->get();
            $hod = Team::whereIsPublished(1)->where('view', 'like', '%' . $team . '%')->where('content', 'like', '%hod%')->orderBy('order', 'asc')->get();
            $bm = Team::whereIsPublished(1)->where('view', 'like', '%' . $team . '%')->where('content', 'like', '%bm%')->orderBy('order', 'asc')->get();
            $hod = $hod->groupBy('rank');
            $bm = $bm->groupBy('rank');
        } else {
            $teams = Team::whereIsPublished(1)->where('view', 'like', '%' . $team . '%')->orderBy('order', 'asc')->get();
        }
        $page = Page::whereIsPublished(1)->where('slug', 'like', '%' . $team . '%')->first();
        //        $teams = Team::whereIsPublished(1)->where('view','like','%'.$team.'%')->orderBy('order', 'asc')->groupBy('rank')->get();
        $teams = $teams->groupBy('rank');
    
        

        if ($team == 'bod') {
            $title = 'Board of Directors';
        } else {
            $title = 'Management Team';
        }
        return view('frontend.teams.detail', compact('teams', 'title','page','hod', 'bm'));
    }
}
