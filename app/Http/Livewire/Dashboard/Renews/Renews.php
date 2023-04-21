<?php

namespace App\Http\Livewire\Dashboard\Renews;

use App\Models\Renew;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Renews extends Component
{
    //Use pagination
    use WithPagination;

    //Add Bootstrap to pagination
    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newRenew = [];
    public $search = "";


    public function render()
    {
        $renews = Renew::latest();
            // ->where('first_name', 'LIKE', $search)
            // ->orWhere('first_name', 'LIKE', $search)
            // ->orWhere('telephone', 'LIKE', $search);
        Carbon::setLocale("fr");
        
        return view('livewire.dashboard.renews.index', [
           
            "agency_renews" => $renews
                ->where('agency_id', getAgencyId())
                ->paginate(30)->onEachSide(2),
        ])->extends('layouts.dashboard')->section("content");
    }
}
