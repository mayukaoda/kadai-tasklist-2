<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasklistsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasklists' => $tasklists,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('welcome');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
        ]);

        $request->user()->tasklists()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect('/');
    }
    public function destroy($id)
    {
        $micropost = \App\Tasklist::find($id);

        if (\Auth::user()->id === $tasklist->user_id) {
            $tasklisst->delete();
        }

        return redirect()->back();
    }
}
