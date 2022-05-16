<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create(){
        return view('session.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => ['required' , 'email'],
            'password'=>['required']
        ]);

        if( ! auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be found. Please try again.'
            ]);

        }

        session()->regenerate();

        return redirect('/')->with('success','Welcome Back');

        //Other method than throw( totally fine)
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials could not be found. Please try again.']);
    }

    public function destroy(){
        auth()->logout();

        return redirect('')->with('success', 'Goodbye !');
    }


}
