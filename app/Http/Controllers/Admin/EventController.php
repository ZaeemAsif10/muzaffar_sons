<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Annual_event;
use App\Models\Event;
use App\Models\Event_slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        return view('admin_side.events.index');
    }

    public function getEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function EventsSlider()
    {
        $events_slider = Event_slider::all();
        return view('admin_side.events.events_slider', compact('events_slider'));
    }

    public function createEventsSlider()
    {
        $events = Event::all();
        return view('admin_side.events.create_event_slider', compact('events'));
    }

    public function storeEvents(Request $request)
    {
        $data = $request->all();
        $rules = array(
            'name' => 'required',

        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }

        $events = new Event();
        $events->name = $request->input('name');

        $events->save();
        return response()->json([
            'status' => 200,
            'message' => 'Event added successfully',
        ]);
    }

    public function storeEventsSlider(Request $request)
    {

        $request->validate([
            'event_id'=>'required',
            'image'=>'required',
        ]);

        $events = new Event_slider();
        $events->event_id = $request->input('event_id');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/events/slider/', $filename);
            $events->image = $filename;
        }

        $events->save();
        return redirect('events/slider')->with('message','Events slider added successfully');
    }

    public function editEvents(Request $request)
    {
        $events = Event::find($request->id);
        return $events;
    }

    public function editEventsSlider(Request $request)
    {
        $event_slider = Event_slider::find($request->id);
        $events = Event::all();
        return view('admin_side.events.edit_event_slider', compact('event_slider','events'));
    }

    public function updateEvents(Request $request)
    {

        $events = Event::find($request->events_id);
        $events->name = $request->input('name');

        $events->update();
        return response()->json([
            'status' => 200,
            'message' => 'Event updated successfully',
        ]);
    }

    public function updateEventsSlider(Request $request)
    {

        $event_slider = Event_slider::find($request->events_slider_id);
        $event_slider->event_id = $request->input('event_id');

        if ($request->hasFile('image')) {

            $path = 'storage/app/public/uploads/events/slider/' . $event_slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->move('storage/app/public/uploads/events/slider/', $filename);
            $event_slider->image = $filename;
        }

        $event_slider->update();
        return redirect('events/slider')->with('message','Events update successfullly');
    }

    public function deleteEvents(Request $request)
    {
        $events = Event::find($request->id);
        if($events->delete())
        {
            return response()->json([
                'status' => 200,
                'message' => 'Event deleted successfully'
            ]);
        }
    }

    public function deleteEventsSlider(Request $request)
    {
        $event_slider = Event_slider::find($request->id);
        if($event_slider)
        {
            $path = 'storage/app/public/uploads/events/slider/'.$event_slider->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $event_slider->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Event deleted successfully',
            ]);
        }
    }

    public function annualEvent()
    {
        $annual_events = Event::all();
        return view('admin_side.events.annual_events', compact('annual_events'));
    }

    public function annualEventCreate()
    {
        $events = Event::all();
        return view('admin_side.events.create_dubai_events', compact('events'));
    }

    public function annualEventStore(Request $request)
    {
        $c = 0;
        if ($request->has('images')) {
            $c++;
            foreach ($request->file('images') as $image) {

                $uniqueid = uniqid();
                $extension = $image->getClientOriginalExtension();
                $name = Carbon::now()->format('Ymd') . '_' . $c . $uniqueid . '.' . $extension;
                $path = $image->storeAs('public/uploads/annual_events/', $name);

                $image = new Annual_event();
                $image->event_id = $request->event_id;
                $image->images = $name;
                $image->save();
            }
        }

        return back();
    }

    public function annualEventEdit($id)
    {
        $events = Event::all();
        $annual = Annual_event::where('event_id',$id)->get();
        return view('admin_side.events.edit_annual_events', compact('events','annual'));
    }

    public function annualEventUpdate(Request $request)
    {
        $annual = Annual_event::find($request->annual_event_id);
        // $annual = Annual_event::where('id',$request->annual_event_id)->get();
        // $annual->event_id = $request->input('event_id');


        if ($request->hasFile('images')) {

            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/app/public/uploads/annual_events/', $filename);
            $annual->images = $filename;

        }

        $annual->update();

        return response()->json([
            'status' => 200,
            'message' => 'Porject updated successfully',
        ]);
    }
}
