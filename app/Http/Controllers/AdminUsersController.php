<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(7);


        return view('admin.users.index', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();


        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $userData = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['name' => $name]);

            $userData['photo_id'] = $photo->id;

        }

        $userData['password'] = bcrypt($userData['password']);

        User::create($userData);

        flash('El usuario se ha creado', 'success');
//        User::create(['role_id' => $userData['role_id'], 'is_active' => $userData['is_active'],
//            'name' => $userData['name'], 'password' => Hash::make($userData['password']), 'email' => $userData['email'],  'photo_id' => $userData['photo_id']]);


        return redirect('/admin/users');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::pluck('name', 'id')->all();

        $user = User::findOrFail($id);

        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
        $updateData = $request->all();

        $user = User::findOrFail($id);


        if ($updateData['password']) {

            $updateData['password'] = bcrypt($updateData['password']);

        } else {
            $updateData['password'] = $user->password;
        }

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['name' => $name]);

            if ($user->photo) {
                unlink(public_path($user->photo->name));

                $photoToDelete = Photo::findOrFail($user->photo_id);

                $photoToDelete->delete();
            }

            $updateData['photo_id'] = $photo->id;

        }

        flash('El usuario se ha actualizado de forma correcta', 'success');


        $user->update($updateData);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);

        if ($user->photo) {
            $image = $user->photo->name;

            unlink(public_path($image));

            $photo = Photo::findOrFail($user->photo_id);
            $photo->delete();
        }

        $user->delete();

        flash('El usuario se ha borrado de forma correcta', 'danger');


        return redirect('/admin/users');


    }
}
