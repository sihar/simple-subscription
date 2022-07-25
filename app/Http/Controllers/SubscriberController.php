<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller {

    public function index() {
        $subscriber = Subscriber::all();
        if($subscriber) {
            return response()->json([
                'success' => true,
                'data' => $subscriber
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => 'Data not found!'
            ], 400);
        }
    }
    
    public function show($id)
    {
        $subscriber = Subscriber::find($id);
        if($subscriber) {
            return response()->json([
                'success' => true,
                'data' => $subscriber
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => 'Data not found!'
            ], 400);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website' => 'required',
            'email' => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => $validator->getMessageBag()
            ], 400);
        
        }else{

            $Subscriber = new Subscriber;
            $Subscriber->website = $request->website;
            $Subscriber->email = $request->email;
            $Subscriber->save();

            return response()->json([
                'success' => true,
                'data' => $Subscriber,
                'message' => 'Subscriber saved sucessfully!'
            ], 200);

        }
        
    }

    public function destroy($id) {
        $Subscriber = Subscriber::find($id);
        if($Subscriber) {
            $Subscriber->delete();
            return response()->json([
                'success' => true,
                'data' => $Subscriber,
                'message' => 'Subscriber deleted sucessfully!'
            ], 200);
            
        }else {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Fail!'
            ], 200);
        }
    }
}