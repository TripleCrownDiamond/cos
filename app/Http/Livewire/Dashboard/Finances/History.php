<?php

namespace App\Http\Livewire\Dashboard\Finances;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    //Use pagination
    use WithPagination;

    //Add Bootstrap to pagination
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $history = Transaction::latest();
        Carbon::setLocale("fr");

        return view('livewire.dashboard.finances.history', [

            "adminHistories" => $history
            ->where('agency_id', getAgencyId())
            ->paginate(30)->onEachSide(2),

            "userHistories" => $history
            ->where('user_id', auth()->user()->id)
            ->paginate(30)->onEachSide(2),

        ])->extends('layouts.dashboard')->section("content");
    }
}
