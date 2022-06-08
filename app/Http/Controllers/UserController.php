<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Models\Users;
use App\Models\Users;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();

        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $data = $request->only([
        //     'username',
        // ]);

        // // dd($request, $data);
        // $data['password'] = md5($request->password);
        // Users::create($data);
        // return back();

        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required|min:5|max:8',
        // ]);

        $user = new Users();
        // dd($user);
        $user->username = $request->username;
        $user->password = md5($request->password);
        $user->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            // 'password' => 'min:5|max:8',
        ]);

        $user = Users::find($id);
        $user->update([
            'username' => $request->username,
            'password' => md5($request->password),
        ]);
        return back();

        // $users = Users::findOrFail($id);
        // $users->username = $request->username;
        // $users->password = md5($request->password);
        // $users->update();
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::findOrFail($id);
        $users->delete();
        return back();
    }
}
