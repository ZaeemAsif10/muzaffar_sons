<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Annual_event;
use App\Models\Block;
use App\Models\Blog;
use App\Models\Blog_slider;
use App\Models\Detail_slider;
use App\Models\Event_slider;
use App\Models\Gallery;
use App\Models\News;
use App\Models\News_slider;
use App\Models\Payment_plan;
use App\Models\Project;
use App\Models\Project_detail;
use App\Models\Project_slider;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::all();
        $news = News::take(3)->get();
        $blogs = Blog::take(3)->get();;
        $project_slider = Project::all();
        return view('web-side.index', compact('sliders', 'project_slider', 'news', 'blogs'));
    }

    public function about()
    {
        return view('web-side.about');
    }


    public function Projects(Request $request)
    {
        $projects = Project::find($request->id);
        $project_slider = Project_slider::where('project_id', $projects->id)->get();
        $project_details = Project_detail::where('project_id', $projects->id)->get();
        $detail_slider = Detail_slider::where('project_id',  $projects->id)->get();
        $slug = $projects->id;

        return view('web-side.al-jalil', get_defined_vars());
    }

    public function Events(Request $request)
    {
        $event_slider = Event_slider::where('event_id', $request->id)->get();
        $annual_events = Annual_event::where('event_id', $request->id)->get();
        $event_id = $request->id;
        return view('web-side.events', get_defined_vars());
    }

    public function westMarina()
    {
        return view('web-side.west-marina');
    }

    public function alBari()
    {
        return view('web-side.al-bari');
    }

    public function westMarinaExecutive()
    {
        return view('web-side.west-marina-exicutive');
    }

    public function westMarinaCotalages()
    {
        return view('web-side.west_marina_cotalages');
    }

    public function marinaSports()
    {
        return view('web-side.marina-sports');
    }

    public function Blog()
    {
        $blogs = Blog::paginate(3);
        $blog_slider = Blog_slider::all();
        return view('web-side.blog', compact('blogs', 'blog_slider'));
    }

    public function News()
    {
        $news = News::paginate(3);
        $news_slider = News_slider::all();
        return view('web-side.news', compact('news', 'news_slider'));
    }

    public function Gallery(Request $request)
    {
        $galleries = Gallery::all();
        return view('web-side.gallery', get_defined_vars());
    }

    public function GalleryImages(Request $request)
    {
        $gallImg = Gallery::where('block_id', $request->id)->get();
        return $gallImg;
    }

    // public function AllGalleryImages()
    // {
    //     $allGallerys = Gallery::all();
    //     return view('web-side.gallery', get_defined_vars());
    // }

    public function Contact()
    {
        return view('web-side.contact');
    }

    public function annualConference()
    {
        return view('web-side.annual_conference');
    }

    public function dubaiEvents()
    {
        return view('web-side.dubai_events');
    }

    public function More(Request $request)
    {
        $more = Blog::find($request->id);
        $blog_detail = Blog::all();
        return view('web-side.blog_more', compact('more', 'blog_detail'));
    }

    public function MoreNews($id)
    {
        $more_news = News::find($id);
        $news_details = News::all();
        // $news_id = $id;
        return view('web-side.news_more', compact('more_news', 'news_details'));
    }

    public function Pirvacy()
    {
        $blog_detail = Blog::all();
        return view('web-side.privacy', compact('blog_detail'));
    }
}
