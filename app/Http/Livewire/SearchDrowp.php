<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SearchDrowp extends Component
{

    public $search;
    public $searchResults = [];



    public function updatedSearch($newvalue)
    {

        if (strlen($this->search) > 3) {

            $this->searchResults = [];


            return;
        }

        $response = Http::get('https://itunes.apple.com/search/?term=' . $this->search . '&limit=10');
        //  dd($response->json());

        $this->searchResults = $response->json()['results'];
        //dd($this->searchResults);


    }

    public function render()
    {
        return view('livewire.search-drowp');
    }
}
