<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photograph;


class PhotographController extends Controller
{

    public function index()
    {
        $photographs = Photograph::all();
        return response()->json([
            'status' => 'success',
            'photographs' => $photographs,
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'date' => 'required',
        //     'image' => 'required',
        //     'device' => 'required',
        //     'location' => 'required',
        //     'photographer' => 'required',
        //     'likes' => 'required',
        //     'categories' => 'required',
        //     'description' => 'required',
        // ]);
        $photograph = new Photograph;
        $photograph->title = $request->title;
        $photograph->date = $request->date;
        $photograph->image = $request->image;
        $photograph->device = $request->device;
        $photograph->location = $request->location;
        $photograph->photographer = $request->photographer;
        $photograph->likes = $request->likes;
        $photograph->categories = $request->categories;
        $photograph->description = $request->description;

        $photograph->save();


        return response()->json([
            "status" => "success",
            "photograph" => $photograph
        ], 201);
    }

    public function show($id)
    {
        $photograph = Photograph::find($id);
        if ($photograph) {

            return response()->json([
                'status' => 'success',
                'pho$photograph' => $photograph,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Photograph was not found!!!',
                'id' => $id,
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $photograph = Photograph::find($id);

        if ($photograph) {
            $request->validate([
                'title' => 'required',
                'date' => 'required',
                'image' => 'required',
                'device' => 'required',
                'location' => 'required',
                'photographer' => 'required',
                'likes' => 'required',
                'categories' => 'required',
                'description' => 'required',
            ]);

            $input = $request->all();

            $photograph->update($input);
            return response()->json([
                'status' => 'success',
                'message' => 'Photograph updated successfully',
                'photograph' => $photograph,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Photograph was not found!!!',
                'id' => $id,
            ]);
        }
    }

    public function destroy($id)
    {
        $photograph = Photograph::find($id);
        $photograph->delete();

        if ($photograph) {

            return response()->json([
                'status' => 'success',
                'message' => 'Photograph deleted successfully',
                'book' => $photograph,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Photograph was not found!!!',
                'id' => $id,
            ]);
        }
    }
}
