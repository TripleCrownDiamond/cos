<?php

namespace App\Http\Livewire\Dashboard\Partners;

use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;

class Partners extends Component
{
   

    public $currentPage = PAGELIST;

    public $newUser = [];
    public $editUser = [];
    public $search = "";

    public $rolePermissions = [];

    protected $messages =  [
        'newUser.first_name.required' => 'Entrez votre prénom',
        'newUser.last_name.required' => 'Entrez votre nom',
        'newUser.email.required' => 'Entrez votre adresse email',
        'newUser.email.email' => 'Adresse email invalide',
        'newUser.email.unique' => 'Il existe déjà un compte avec cette adresse email',
        'newUser.telephone.required' => 'Entrez le numéro de téléphone',
        'newUser.telephone.numeric' => 'Numéro de téléphone invalide',
        'newUser.telephone.unique' => 'Il existe déjà un compte avec ce numéro de téléphone',
        'newUser.whatsapp.numeric' => 'Numéro WhatsApp invalide',
        'newUser.password.required' => 'Numéro WhatsApp invalide',
        'newUser.password.confirmed' => 'Les deux mot de passe ne correspondent pas',
        'newUser.password.regex' => 'Le mot de passe doit contenir des lettre et des chiffres',
        'newUser.password.min' => 'Le mot de passe doit contenir dau moins 6 caractères',
    ];

    public function render()
    {
       
        $partners = User::latest();
            // ->where('first_name', 'LIKE', $search)
            // ->orWhere('first_name', 'LIKE', $search)
            // ->orWhere('telephone', 'LIKE', $search);
        Carbon::setLocale("fr");

        return view('livewire.dashboard.partners.index',[
            // "users" => User::latest()->paginate(10)->onEachSide(2)
            // ->where('first_name', 'LIKE', $search)
            // ->orWhere('first_name', 'LIKE', $search)
            // ->orWhere('telephone', 'LIKE', $search)
            // ->where('agency_id', getAgencyId())->whereHas('roles', function($q){
            //     $q->where('id', 3);
            // });
           
            "users" => $partners
                ->where('agency_id', getAgencyId())->whereHas('roles', function($q){
                    $q->where('id', 3);
                })
                ->paginate(30)->onEachSide(2),
        ])->extends('layouts.dashboard')->section("content");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editUser.last_name' => 'required',
                'editUser.first_name' => 'required',
                'editUser.email' => ['required', 'email', ValidationRule::unique("users", "email")->ignore($this->editUser['id']) ] ,
                'editUser.telephone' => ['required', 'numeric', ValidationRule::unique("users", "telephone")->ignore($this->editUser['id']) ]  ,
                'editUser.whatsapp' => ['required', 'numeric']  ,
            ];
        }

        return [
            'newUser.email' => 'required|email:filter|unique:users,email',
            'newUser.first_name' => 'required',
            'newUser.last_name' => 'required',
            'newUser.telephone' => 'required|numeric|unique:users,telephone',
            'newUser.whatsapp' => 'numeric',
            'newUser.password' => 'required|confirmed|min:6',
        ];
    }

    public function addUser(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        $validationAttributes["newUser"]["password"] = Hash::make($validationAttributes['newUser']['password']);

        if($validationAttributes) {
            $agency_id = getAgencyId();
            $validationAttributes['newUser']['agency_id'] = $agency_id;
            $newUser = User::create($validationAttributes["newUser"]);
            $user_id = $newUser->id;
            $user_role = ['user_id' => $user_id, 'role_id' => 3];
            UserRole::create($user_role);
            

            $this->dispatchBrowserEvent('success', ['content'=> "Partenaire ajouté avec succès"]);
            //return redirect()->to('/login');
            $this->newUser = [];
        }else{
            $this->dispatchBrowserEvent('error', ['content'=> "Un problème est survenu. Réessayez svp !"]);
        }
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("confirmDelete", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des partenaires. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "user_id" => $id
            ]
        ]]);
    }

    public function updateUser(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();


        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("success", ["content"=>"Utilisateur mis à jour avec succès!"]);

    }

    public function confirmPwdReset(){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de réinitialiser le mot de passe de cet utilisateur. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning"
        ]]);
    }

    public function resetPassword(){
        User::find($this->editUser["id"])->update(["password" => Hash::make(DEFAULTPASSOWRD)]);
        $this->dispatchBrowserEvent("success", ["content"=>"Mot de passe utilisateur réinitialisé avec succès!"]);
    }


    public function deleteUser($id) {
        User::destroy($id);
        $this->dispatchBrowserEvent('success', ['content'=> "Partenaire supprimé avec succès"]);
    }

    public function goToAddUser(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditUser($id){
        $this->editUser = User::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;

        //$this->populateRolePermissions();
    }

    public function returnBack(){
     
        $this->currentPage = PAGELIST;
      
    }
}
