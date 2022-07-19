<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin_side.gallery.index');
    }

    public function Gallery(Request $request)
    {
        $gallery = Block::all();
        return view('admin_side.gallery.gallery', compact('gallery'));
    }

    public function GalleryCreate()
    {
        $blocks = Block::all();
        return view('admin_side.gallery.create_gallery', compact('blocks'));
    }

    public function GalleryStore(Request $request)
    {
        $c = 0;
        if ($request->has('images')) {
            $c++;
            foreach ($request->file('images') as $image) {

                $uniqueid = uniqid();
                $extension = $image->getClientOriginalExtension();
                $name = Carbon::now()->format('Ymd') . '_' . $c . $uniqueid . '.' . $extension;
                $path = $image->storeAs('public/uploads/gallery/', $name);

                $image = new Gallery();
                $image->block_id = $request->block_id;
                $image->images = $name;
                $image->save();
            }
        }

        return back();
    }


    public function getBlock()
    {
        $block = Block::all();
        return response()->json($block);
    }

    public function storeBlock(Request $request)
    {
        $data = $request->all();
        $rules = array(
            'name' => 'required',

        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }

        $block = new Block();
        $block->name = $request->input('name');

        $block->save();
        return response()->json([
            'status' => 200,
            'message' => 'Block added successfully',
        ]);
    }

    public function editBlock(Request $request)
    {
        $block = Block::find($request->id);
        return $block;
    }

    public function updateBlock(Request $request)
    {

        $block = Block::find($request->block_id);
        $block->name = $request->input('name');

        $block->update();
        return response()->json([
            'status' => 200,
            'message' => 'Block updated successfully',
        ]);
    }

    public function deleteBlock(Request $request)
    {
        $block = Block::find($request->id);
        if ($block->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Block deleted successfully'
            ]);
        }
    }
}
