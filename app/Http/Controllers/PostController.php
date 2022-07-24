<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller {

    public function index() {
        $post = Post::all();
        if($post) {
            return response()->json([
                'success' => true,
                'data' => $post
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
        $post = Post::find($id);
        if($post) {
            return response()->json([
                'success' => true,
                'data' => $post
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
            'title' => 'required',
            'description' => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => $validator->getMessageBag()
            ], 400);
        
        }else{

            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();

            return response()->json([
                'success' => true,
                'data' => $post,
                'message' => 'Post saved sucessfully!'
            ], 200);

        }
        
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($post) {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);
     
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => null,
                    'message' => $validator->getMessageBag()
                ], 400);
            
            }else{
                $post->title = $request->title;
                $post->description = $request->description;
                $post->save();
                
                return response()->json([
                    'success' => true,
                    'data' => $post,
                    'message' => 'Post saved sucessfully!'
                ], 200);
            }

        }else{

            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Data not found!'
            ], 400);
        }
        
    }

    public function destroy($id) {
        $post = Post::find($id);
        if($post) {
            $post->delete();
            return response()->json([
                'success' => true,
                'data' => $post,
                'message' => 'Post deleted sucessfully!'
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