<?php

namespace App\Http\Livewire\Dashboard\Formulas;

use App\Models\Formula;
use Carbon\Carbon;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;


class FormulasList extends Component
{
    //Use pagination
    //use WithPagination;

    //Add Bootstrap to pagination
    //protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newFormula = [];
    public $editFormula = [];
    public $search = "";

    protected $messages =  [
        'newFormula.name.required' => 'Entrez le nom de la formule',
        'newFormula.name.unique' => 'Cette formule existe déjà',
        'newFormula.regular_price.required' => 'Entrez le prix normal de la formule',
        'newFormula.regular_price.numeric' => 'Le format du prix est invalide',
        'newFormula.promo_price.numeric' => 'Le format du prix est invalide',
    ];

    public function render()
    {
        $formulas = Formula::all();
        Carbon::setLocale("fr");

        return view('livewire.dashboard.formulas.index',[
            // "users" => User::latest()->paginate(10)->onEachSide(2)
           
            "formulas" => $formulas->where('agency_id', getAgencyId())
        ])->extends('layouts.dashboard')->section("content");
    }

    public function goToAddFormula(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("confirmDelete", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des formules. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "formula_id" => $id
            ]
        ]]);
    }

    public function deleteFormula($id) {
        Formula::destroy($id);
        $this->dispatchBrowserEvent('success', ['content'=> "Formule supprimé avec succès"]);
    }


    public function returnBack(){
     
        $this->currentPage = PAGELIST;
      
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editFormula.name' => ['required', ValidationRule::unique("formulas", "name")->ignore($this->editFormula['id']) ] ,
                'editFormula.regular_price' => ['required', 'numeric'],
                'editFormula.promo_price' => ['numeric'],
            ];
        }

        return [
            'newFormula.name' => 'required|unique:formulas,name',
            'newFormula.regular_price' => 'required|numeric',
            'newFormula.promo_price' => 'numeric',
        ];
    }

    public function goToEditFormula($id){
        $this->editFormula = Formula::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;

        //$this->populateRolePermissions();
    }

    public function updateFormula(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

         if($validationAttributes["editFormula"]["promo_price"] === NULL) {
             $validationAttributes["editFormula"]["promo_price"] = 0.00;
         }

        // dd($validationAttributes["editFormula"]["promo_price"]);
        // exit;
        
        Formula::find($this->editFormula["id"])->update($validationAttributes["editFormula"]);

        $this->dispatchBrowserEvent("success", ["content"=>"Formule mise à jour avec succès!"]);

    }

    public function addFormula(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        $validationAttributes["newFormula"]["agency_id"] = getAgencyId();

        if($validationAttributes) {
           
            Formula::create($validationAttributes["newFormula"]);
        
        
            $this->dispatchBrowserEvent('success', ['content'=> "Formule ajouté avec succès"]);
            //return redirect()->to('/login');
            $this->newFormula = [];
        }else{
            $this->dispatchBrowserEvent('error', ['content'=> "Un problème est survenu. Réessayez svp !"]);
        }
    }
}
