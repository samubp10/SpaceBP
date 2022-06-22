<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;




class ShowNews extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $newsNoPag;


    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }



    public function render()
    {

        $cont = 0;
        $newsPag = $this->paginate($this->newsNoPag, $this->perPage);


        return view('livewire.show-news', ['news' => $newsPag, 'cont' => $cont]);
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
