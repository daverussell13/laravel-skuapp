<div class="row">
    <div class="col-12 col-md-5">
        <div class="card">
            <div class="card-header">
                <h4>Transaction Items List</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Action</th>
                        </tr>
                        @foreach ($items as $index => $item)
                            <tr>
                                <td class="align-middle">{{ $item['food_name'] }}</td>
                                <td class="text-center align-middle" style="white-space: nowrap;">
                                    {{ number_format($item['food_price'], 0, ',', '.') }}
                                </td>
                                <td class="d-flex justify-content-center">
                                    <input wire:model="items.{{ $index }}.food_qty" type="number"
                                        class="form-control" style="max-width: 80px" min="1"
                                        max="{{ $item['food_stock'] }}" value="{{ $item['food_qty'] }}">
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-danger"
                                        wire:click="$emit('deleteItem', {{ $index }})">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-success" wire:click="create()">
                    Create
                </button>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-7">
        <div class="card">
            <div class="card-header">
                <h4>Add items</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" wire:model="search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Action</th>
                        </tr>
                        @foreach ($foods as $key => $food)
                            <tr>
                                <td class="text-center">{{ $foods->firstItem() + $key }}</td>
                                <td class="text-center">{{ $food->name }}</td>
                                <td class="text-center">
                                    {{ number_format($food->price, 0, ',', '.') }}
                                </td>
                                <td class="text-center">{{ $food->stock }}</td>
                                <td class="text-center">
                                    <button href="#" @if (!$food->stock) @disabled(true) @endif
                                        class="btn btn-success @if (!$food->stock) disabled @endif"
                                        wire:click="$emit('addItem',{{ $food->id }})">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    {{ $foods->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
