<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\News_slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin_side.news.index');
    }

    public function getNews()
    {
        $news = News::all();
        return response()->json($news);
    }

    public function create()
    {
        return view('admin_side.news.create');
    }

    public function NewsSlider()
    {
        $news_slider = News_slider::all();
        return view('admin_side.news.news_slider', compact('news_slider'));
    }

    public function createNewsSlider()
    {
        return view('admin_side.news.create_news_slider');
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/news/', $filename);
            $news->image = $filename;
        }

        $news->image_path = $path;

        $news->save();
        return redirect('admin/news')->with('message', 'News addedd successfully');
    }

    public function storeNewsSlider(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'image'=>'required',
        ]);

        $blogs = new News_slider();
        $blogs->title = $request->input('title');
        $blogs->desc = $request->input('desc');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/news/slider/', $filename);
            $blogs->image = $filename;
        }

        $blogs->save();
        return redirect('news/slider')->with('message','News slider added successfully');
    }


    public function editNews(Request $request)
    {
        $news = News::find($request->id);
        return view('admin_side.news.edit', compact('news'));
    }

    public function editNewsSlider(Request $request)
    {
        $news_slider = News_slider::find($request->id);
        return view('admin_side.news.edit_news_slider', compact('news_slider'));
    }

    public function updateNews(Request $request)
    {

        $news = News::find($request->news_id);

        $news->title = $request->input('title');
        $news->description = $request->input('description');


        if ($request->hasFile('image')) {

            $path = 'storage/app/public/uploads/news/' . $news->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/news/', $filename);
            $news->image = $filename;
        }

        $news->update();
        return redirect('admin/news')->with('message','News updated successfully');
    }

    public function updateNewsSlider(Request $request)
    {

        $blogs = News_slider::find($request->news_slider_id);

        $blogs->title = $request->input('title');
        $blogs->desc = $request->input('desc');


        if ($request->hasFile('image')) {

            $path = 'storage/app/public/uploads/news/slider/' . $blogs->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/news/slider/', $filename);
            $blogs->image = $filename;
        }

        $blogs->update();
        return redirect('news/slider')->with('message','Blog update successfullly');
    }

    public function deleteNews(Request $request)
    {
        $news = News::find($request->id);
        if($news)
        {
            $path = 'storage/app/public/uploads/news/'.$news->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $news->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'News deleted successfully',
            ]);
        }
    }

    public function deleteNewsSlider(Request $request)
    {
        $news = News_slider::find($request->id);
        if($news)
        {
            $path = 'storage/app/public/uploads/news/slider/'.$news->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $news->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'News deleted successfully',
            ]);
        }
    }
}
