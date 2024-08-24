<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'name' => ['required'],
        'password' => ['required'],
    ];
    public function authUser(){
        // dd(Hash::make('gto3000gt'));
        // Auth::login(User::find(1));
        $this->validate();
        // dd($this->validate(),Auth::attempt($this->validate()));

        $user = User::where('name',$this->validate()['name'])->first();
        dd($user,$user->password);
        if($user){
            Auth::login($user);
            return redirect()->intended(route('home'));
        }else{
            $this->addError('name', 'login error');
        }
        
    }
    public function authenticate()
    {
        $this->validate();
        // dd($this->validate());
        if (!Auth::attempt(['name' => $this->name, 'password' => $this->password], $this->remember)) {
            $this->addError('name', trans('auth.failed'));

            return;
        }

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
