<?php

namespace App\Http\Livewire\Dashboard\Finances;

use App\Models\DebitCredit;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserDebitCredit;
use Livewire\Component;
use Livewire\WithPagination;

class Finances extends Component
{
    //Use pagination
    use WithPagination;

    //Add Bootstrap to pagination
    protected $paginationTheme = "bootstrap";

    public $currentPage = OPERATIONS;

    public $editUserBalance = [];
    public $transaction = [];
    
    protected $messages =  [
        'editUserBalance.newbalance.required' => 'Entrez un montant',
        'editUserBalance.newbalance.numeric' => 'Le montant est invalide',
    ];

    public function render()
    {
        $partners = User::latest();

        return view('livewire.dashboard.finances.index', [
            "users" => $partners
            ->where('agency_id', getAgencyId())->whereHas('roles', function($q){
                $q->where('id', 3);
            })
            ->paginate(30)->onEachSide(2),
        ])->extends('layouts.dashboard')->section("content");
    }

    public function goToCredit($id) {
        $this->editUserBalance = User::find($id)->toArray();
        $this->currentPage = CREDIT;
    }

    public function goToDebit($id) {
        $this->editUserBalance = User::find($id)->toArray();
        $this->currentPage = DEBIT;
    }

    public function rules(){
        if($this->currentPage == CREDIT){
            return [
                'editUserBalance.newbalance' => 'required|numeric',
            ];
        }

        return [
            'editUserBalance.newbalance' => 'required|numeric',
        ];
    }

    public function updateBalance(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        if($this->currentPage == DEBIT) {

            if($validationAttributes["editUserBalance"]["newbalance"] > User::find($this->editUserBalance["id"])->balance) {

                $this->dispatchBrowserEvent("error", ["content"=>"Fonds insuffisants"]);

            }else{
               /*  $txid = uniqid('txid', true);
                $type = "Débit";
                $userId = User::find($this->editUserBalance["id"])->id;
                $agencyId = User::find($this->editUserBalance["id"])->agency_id;

                $transaction = [
                    'txid' => $txid,
                    'amount' => $validationAttributes["editUserBalance"]["balance"],
                    'type' => $type,
                    
                    'user_id' => $userId,
                    'agency_id' => $agencyId
                ];
                Transaction::create($transaction);
                */
                $validationAttributes["editUserBalance"]["balance"] =  User::find($this->editUserBalance["id"])->balance - $validationAttributes["editUserBalance"]["newbalance"];

                User::find($this->editUserBalance["id"])->update($validationAttributes["editUserBalance"]);

                $this->dispatchBrowserEvent("success", ["content"=>"Compte débité avec succès!"]);
            }

        }elseif($this->currentPage == CREDIT){

            $txid = uniqid('txid', true);
            $type = "Crédit";
            $userId = User::find($this->editUserBalance["id"])->id;
            $agencyId = User::find($this->editUserBalance["id"])->agency_id;

            $credit = [
                'txid' => $txid,
                'amount' => $validationAttributes["editUserBalance"]["newbalance"],
                'type' => $type,
                'user_id' => $userId,
                'agency_id' => $agencyId
            ];

            $new_debit_credit = DebitCredit::create($credit);

            $user_credit_debit = [
                'user_id' =>  User::find($this->editUserBalance["id"])->id,
                'debit_credit_id' => $new_debit_credit
            ];

            UserDebitCredit::create($user_credit_debit);

            $validationAttributes["editUserBalance"]["balance"] =  $validationAttributes["editUserBalance"]["newbalance"] + User::find($this->editUserBalance["id"])->balance;


            User::find($this->editUserBalance["id"])->update($validationAttributes["editUserBalance"]);
    
            $this->dispatchBrowserEvent("success", ["content"=>"Compte crédité avec succès!"]);

        }else{
            
        }
    }

    public function returnBack(){
     
        $this->currentPage = OPERATIONS;
      
    }
}
