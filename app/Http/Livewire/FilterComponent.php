<?php

namespace App\Http\Livewire;

use App\Models\Categores;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class FilterComponent extends Component
{

  public $category = [];
  public $selectedField = [];
  public $productlimit = 1;
  public $displayProduct = [];

  public function onchange($checked, $value)
  {

      if ($checked) {

          $this->selectedField = [...$this->selectedField, $value];
      } else {

          array_splice($this->selectedField,  array_search($value, $this->selectedField), 1);
      }
      $this->displayProduct = [];
      foreach ($this->productData as $product) {


          if (in_array($product['category'], $this->selectedField)) {

              $this->displayProduct = [...$this->displayProduct, $product];
          }
      }
  }

  public function Productlimit()
  {

      $this->productlimit = $this->productlimit + 1;
  }

  public function render()
  {
    $response = Http::get('https://fakestoreapi.com/products');
    // dd($response->json());
    $this->productData = $response->json();


    foreach ($this->productData as $product) {


      if (!in_array($product['category'], $this->category)) {

        $this->category = [...$this->category, $product['category']];
      }
    }
    return view('livewire.filter-component', ['products' => $this->productData, 'category'=>$this->category, 'selectedField' => $this->selectedField, 'productlimit' => $this->productlimit ]);

  }
}
