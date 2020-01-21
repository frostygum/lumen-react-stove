<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAll() 
    {
        $todo = Todo::all();
        return response($todo);
    }
    
    public function show($id) 
    {
        $todo = Todo::where('id',$id)->get();

        if($todo == '[]') {
            return response()->json(['message' => 'Activity With Specified Id Not Found!', 'code' => '404'], 404);
        }
        else {
            return response()->json($todo);
        }
        
        
    }

    public function destroy($id) 
    {
        try {
            $todo = Todo::where('id',$id)->firstOrFail();
            $todo->delete();
    
            return response()->json(['message' => 'Successfully Deleted Todo Activity', 'code' => '201'], 201);
        }
        catch (\Exception $e) {
            return response()->json(['message' => 'Id Not Found!', 'code' => '404'], 404);
        }
        
    }

    /**
     * add todo to the authenticated User.
     *
     * @return Response
     */
    public function addTodo(Request $request)
    {
        $this->validate($request, [
            'activity' => 'required|string',
            'description' => 'required|string',
        ]);

        $todo = new Todo();
        $todo->activity = $request->input('activity');
        $todo->description = $request->input('description');
        $todo->save();
    
        return response()->json(['message' => 'Successfully added todo activity', 'code' => '201'], 201);
    }

}
