<?php

namespace App\Http\Livewire\Admin\Guards;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Guard;

class GuardsTable extends Component
{
  use WithPagination;

  public $search = '';
  public $sortField = 'id';
  public $sortAsc = true;
  public $perPage = 10;

  protected $listeners = ['tableRefresh' => '$refresh'];

  public function updatingSearch()
  {
      $this->resetPage();
  }

  public function sortBy($field)
  {
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function paginationView()
  {
      return 'livewire.pagination.tailwind-admin';
  }

  public function render()
  {
      return view('livewire.admin.guards.guards-table', [
        'guards' => Guard::query()
            ->where('name', 'LIKE', "%{$this->search}%") 
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
      ]);
  }
}
