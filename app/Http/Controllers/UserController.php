<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users, 200);
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
   
    public function signUp(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email'     => 'string',
            'password' => 'required'
        ]);

        $user = new User([
            'username' => $request->input('username'),
            'email'     => $request->input('email'),
            'password' => base64($request->input('password'))
        ]);

        return response()->json($user, 201);

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
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'No se encontró el usuario.'], 404);
        }
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = base64($request->input('password'));

        $user->save();

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'No se encontró el usuario.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente.'], 200);
    }

    public function signIn(Request $request){
        $this->validate($request, [
            'username' => 'required '
        ]);
    }
}
