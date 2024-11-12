<?php

namespace App\Livewire\Dashboard;

use App\Models\Leader;
use Livewire\Component;
use Livewire\WithPagination;

class LeaderIndex extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $queryString = ['search', 'sortField', 'sortDirection'];

    public $confirmingDeletion = false;
    public $deletingLeader;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDeletion(string $id)
    {
        $this->deletingLeader = $id;

        $this->confirmingDeletion = true;
    }

    public function delete(Leader $leader)
    {
        $leader->delete();

        $this->confirmingDeletion = false;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection =
                $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->paginate(5);
    }

    public function getRowsQueryProperty()
    {
        return Leader::query()
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('first_name', 'like', "%{$this->search}%");
    }

    public function render()
    {
        return view('livewire.dashboard.leaders.index', [
            'leaders' => $this->rows,
        ]);
    }
}
