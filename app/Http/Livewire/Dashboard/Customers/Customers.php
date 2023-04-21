<?php

namespace App\Http\Livewire\Dashboard\Customers;

use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ClosureValidationRule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
    //Use pagination
    use WithPagination;

    //Add Bootstrap to pagination
    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newCustomer = [];
    public $editCustomer = [];
    public $search = "";

    protected $messages =  [
        'newCustomer.first_name.required' => 'Entrez le prénom du client',
        'newCustomer.last_name.required' => 'Entrez le nom du client',
        'newCustomer.telephone.required' => 'Entrez le numéro de téléphone',
        'newCustomer.telephone.numeric' => 'Numéro de téléphone invalide',
        'newCustomer.telephone.unique' => 'Il existe déjà un client avec ce numéro de téléphone',
        'newCustomer.numero_abonne.unique' => 'Il existe déjà un client avec ce numéro d\'abonné',
        'newCustomer.numero_abonne.required' => 'Entrez le numéro d\'abonné',
        
    ];

    public function render()
    {
        $customers = Customer::latest();
        Carbon::setLocale("fr");
        return view('livewire.dashboard.customers.index', [
           
            "customers" => $customers
                ->where('user_id', auth()->user()->id)
                ->paginate(30)->onEachSide(2),
        ])->extends('layouts.dashboard')->section("content");;
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editCustomer['id'])
            return [
                'editCustomer.last_name' => 'required',
                'editCustomer.first_name' => 'required',
                'editCustomer.numero_abonne' => ['required', 'numeric', ValidationRule::unique("customers", "numero_abonne")->ignore($this->editCustomer['id']) ],
                'editCustomer.telephone' => ['required', 'numeric', ValidationRule::unique("customers", "telephone")->ignore($this->editCustomer['id']) ],
                ];
        }

        return [
            'newCustomer.first_name' => 'required',
            'newCustomer.last_name' => 'required',
            'newCustomer.numero_abonne' => 'required|numeric|unique:customers,numero_abonne',
            'newCustomer.telephone' => 'required|numeric|unique:customers,telephone',
        ];
    }

    public function addCustomer(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        $validationAttributes["newCustomer"]["user_id"] = auth()->user()->id;

        if($validationAttributes) {
            
            $newCustomer = Customer::create($validationAttributes["newCustomer"]);
            
            $this->dispatchBrowserEvent('success', ['content'=> "Client ajouté avec succès"]);
            //return redirect()->to('/login');
            $this->newCustomer = [];
        }else{
            $this->dispatchBrowserEvent('error', ['content'=> "Un problème est survenu. Réessayez svp !"]);
        }
    }

    public function goToAddCustomer() {
        $this->currentPage = PAGECREATEFORM;
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("confirmDelete", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des clients. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "customer_id" => $id
            ]
        ]]);
    }

    public function deleteCustomer($id) {
        Customer::destroy($id);
        $this->dispatchBrowserEvent('success', ['content'=> "Client supprimé avec succès"]);
    }

    public function goToEditCustomer($id){
        $this->editCustomer = Customer::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;

        //$this->populateRolePermissions();
    }

    public function updateCustomer(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();


        Customer::find($this->editCustomer["id"])->update($validationAttributes["editCustomer"]);

        $this->dispatchBrowserEvent("success", ["content"=>"Informations du client mise à jour avec succès!"]);

    }

    public function returnBack(){
     
        $this->currentPage = PAGELIST;
      
    }
}
