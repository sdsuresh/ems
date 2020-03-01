<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    private $perPage = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('events')->latest()->simplePaginate($this->perPage);
        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $events = Event::all();
        return view('create', compact('companies', 'events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'company_id' => $request->get('company_id'),
            'password' => Hash::make('1234')  //This can extended to have a mail funciton or to generate random number using helper function etc. to send to user's email, just to keep it simple according to requiremnts I just use hash class to generate default password.
        ]);
        $user->events()->attach($request->input('events'), []);
        return redirect('/')->with('success', 'User created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $events = Event::all();
        $user = User::find($id);
        return view('edit', compact('companies', 'events', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    //We can still use UserStoreRequest validation or create new based on requirement.
    public function update(UserUpdateRequest $request)
    {
        $user = User::find($request->input('id'));
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->company_id = $request->get('company_id');
        $user->save();

        $user->events()->sync($request->get('events'));
        return redirect('/')->with('success', 'User updated!');
    }
}
