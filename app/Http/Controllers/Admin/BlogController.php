<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blog_slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin_side.blogs.index');
    }

    public function create()
    {
        return view('admin_side.blogs.create');
    }

    public function BlogSlider()
    {
        $blog_slider = Blog_slider::all();
        return view('admin_side.blogs.blog_slider', compact('blog_slider'));
    }

    public function createBlogSlider()
    {
        return view('admin_side.blogs.create_blog_slider');
    }

    public function getBlogs()
    {
        $blog = Blog::all();
        return response()->json($blog);
    }

    public function storeBlogSlider(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'image'=>'required',
        ]);

        $blogs = new Blog_slider();
        $blogs->title = $request->input('title');
        $blogs->desc = $request->input('desc');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/blogs/sider/', $filename);
            $blogs->image = $filename;
        }


        $blogs->save();
        return back();
    }

    public function storeBlogs(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $blogs = new Blog();
        $blogs->title = $request->input('title');
        $blogs->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/blogs/', $filename);
            $blogs->image = $filename;
        }

        $blogs->image_path = $path;

        $blogs->save();
        return back();
    }

    public function editBlogs(Request $request)
    {
        $blogs = Blog::find($request->id);
        return view('admin_side.blogs.edit', compact('blogs'));
    }

    public function editBlogSlider(Request $request)
    {
        $blog_slider = Blog_slider::find($request->id);
        return view('admin_side.blogs.edit_blog_slider', compact('blog_slider'));
    }

    public function updateBlogs(Request $request)
    {

        $blogs = Blog::find($request->blogs_id);

        $blogs->title = $request->input('title');
        $blogs->description = $request->input('description');


        if ($request->hasFile('image')) {

            $path = 'storage/app/public/uploads/blogs/' . $blogs->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/blogs/', $filename);
            $blogs->image = $filename;
        }

        $blogs->update();
        return redirect('admin/blogs')->with('message','Blog update successfullly');
    }

    public function updateBlogSlider(Request $request)
    {

        $blogs = Blog_slider::find($request->blog_slider_id);

        $blogs->title = $request->input('title');
        $blogs->desc = $request->input('desc');


        if ($request->hasFile('image')) {

            $path = 'storage/app/public/uploads/blogs/sider/' . $blogs->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/blogs/sider/', $filename);
            $blogs->image = $filename;
        }

        $blogs->update();
        return redirect('blog/slider')->with('message','Blog update successfullly');
    }

    public function deleteBlogs(Request $request)
    {
        $blogs = Blog::find($request->id);
        if($blogs)
        {
            $path = 'storage/app/public/uploads/blogs/'.$blogs->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $blogs->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Blog deleted successfully',
            ]);
        }
    }

    public function deleteBlogSlider(Request $request)
    {
        $blogs = Blog_slider::find($request->id);
        if($blogs)
        {
            $path = 'storage/app/public/uploads/blogs/sider/'.$blogs->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $blogs->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Blog deleted successfully',
            ]);
        }
    }
}
