<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\TransactionDetail;
use App\Modules\FrozenFood\FrozenFoodService;
use App\Modules\Transaction\TransactionDetails;
use App\Modules\Transaction\TransactionService;
use Livewire\Component;
use Livewire\WithPagination;

class CreateTransactionTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $items = [];

    protected $listeners = [
        'addItem' => 'addTransactionItem',
        'deleteItem' => 'removeTransactionItem',
        'create' => 'createTransaction'
    ];

    public function render()
    {
        return view('livewire.create-transaction-table', [
            'foods' => Food::where('name', 'like', '%'.$this->search.'%')
                        ->whereNull('deleted_at')
                        ->paginate(5),
            'items' => $this->items
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addTransactionItem(Food $food)
    {
        $this->items[] = [
            "food_id" => $food->id,
            "food_name" => $food->name,
            "food_price" => $food->price,
            "food_qty" => 1,
            "food_stock" => $food->stock
        ];
    }

    public function removeTransactionItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function countTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item["food_price"] * $item["food_qty"];
        }
        return $totalPrice;
    }

    public function create(TransactionService $service)
    {
        try {
            $service->addNewTransaction($this->items, $this->countTotalPrice());
            session()->flash('success', "Successfully create transactions");
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
        }
        return redirect()->to('/transaction/create');
    }
}
