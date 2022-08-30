<?php

namespace App\Http\Livewire\Auth;

use App\Models\Admin;
use App\Models\Agency;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $agency = [
        'agency_name' => '',
        'ifu' => '',
        'agency_email' => '',
        'agency_telephone' => '',
    ];
    public $user = [
        'first_name' => '',
        'last_name' => '',
        'telephone' => '',
        'whatsapp' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => ''
    ];

    protected $messages =  [
        'agency.agency_name.required' => 'Entrez le nom de votre agence',
        'agency.ifu.numeric' => 'L\'identifiant fiscal doit être numérique',
        'agency.agency_email.email' => 'Adresse email invalide',
        'agency.agency_telephone.numeric' => 'Numéro de téléphone invalide',
        'user.first_name.required' => 'Entrez votre prénom',
        'user.last_name.required' => 'Entrez votre nom',
        'user.email.required' => 'Entrez votre adresse email',
        'user.email.email' => 'Adresse email invalide',
        'user.email.unique' => 'Il existe déjà un compte avec cette adresse email',
        'user.telephone.required' => 'Entrez le numéro de téléphone',
        'user.telephone.numeric' => 'Numéro de téléphone invalide',
        'user.telephone.unique' => 'Il existe déjà un compte avec ce numéro de téléphone',
        'user.whatsapp.numeric' => 'Numéro WhatsApp invalide',
        'user.password.required' => 'Numéro WhatsApp invalide',
        'user.password.confirmed' => 'Les deux mot de passe ne correspondent pas',
        'user.password.regex' => 'Le mot de passe doit contenir des lettre et des chiffres',
        'user.password.min' => 'Le mot de passe doit contenir dau moins 6 caractères',
    ];

    public function render()
    {
        return view('livewire.auth.register')
        ->extends('layouts.auth')->section("content");
    }

    public function submit() {

        $agency = $this->validate([
            'agency.agency_name' => 'required',
            'agency.ifu' => 'numeric',
            'agency.agency_email' => 'email:filter',
            'agency.agency_telephone' => 'numeric',
        ]);

        $user = $this->validate([
            'user.email' => 'required|email:filter|unique:users,email',
            'user.first_name' => 'required',
            'user.last_name' => 'required',
            'user.telephone' => 'required|numeric|unique:users,telephone',
            'user.whatsapp' => 'numeric',
            'user.password' => 'required|confirmed|min:6',
            //'user.password_confirmation' => 'required',
        ]);

        $agency['agency']['uniq_id'] = uniqid();
        $user['user']['password'] = Hash::make($user['user']['password']);

        if($agency && $user) {
            $newAgency = Agency::create($agency['agency']);
            $agency_id = $newAgency->id;
            $user['user']['agency_id'] = $agency_id;
            $newUser = User::create($user['user']);
            $user_id = $newUser->id;
            $user_role = ['user_id' => $user_id, 'role_id' => 1];
            UserRole::create($user_role);
            

            $this->dispatchBrowserEvent('success', ['content'=> "Votre agence a été avec succès"]);
            //return redirect()->to('/login');
            $data['form'] = [];
        }else{
            $this->dispatchBrowserEvent('error', ['content'=> "Un problème est survenu. Réessayez svp !"]);
        }
    }
}
