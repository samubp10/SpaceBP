<?php

namespace App\Http\Livewire;

use Livewire\Component;


use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShowPictures extends Component
{
    use WithPagination;

    public $perPage = 9;
    public $picturesNoPag;


    public function loadMore()
    {

        $this->perPage = $this->perPage + 9;
    }


    public function render()
    {

        $cont = 0;
        $picturesPag = $this->paginate($this->picturesNoPag, $this->perPage);



        return view('livewire.show-pictures', ['pictures' => $picturesPag, 'cont' => $cont]);
    }



    public function paginate($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }
}
