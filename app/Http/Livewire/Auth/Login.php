<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{

    public $form = [
        'email' => '',
        'password' => ''
    ];

    protected $messages =  [
        'form.email.required' => 'Entrez votre adresse email',
        'form.email.email' => 'Adresse email invalide',
        'form.email.exists' => 'Aucun compte n\'est lié à cette adresse email',
        'form.password.required' => 'Entrez votre mot de passe'
    ];

    //retourne la vue livewire
    public function render()
    {
        return view('livewire.auth.login')
        ->extends('layouts.auth')->section("content");
    }

    public function submit() {

        $data = $this->validate([
            'form.email' => 'required|email:filter|exists:users,email',
            'form.password' => 'required',
        ]);

        $user = User::where('email', $data['form']['email'])->first();

        if($user && Hash::check($data['form']['password'], $user->password)){
            Auth::loginUsingId($user->id);
            $this->dispatchBrowserEvent('success', ['content'=> "Vous allez être redirigé sur votre tableau de bord"]);
            return redirect()->to('/dashboard');
            $data['form'] = [];
        }else{
            $this->dispatchBrowserEvent('error', ['content'=> "Mot de passe incorrect. Réessayez svp !"]);
        }
    }
}


