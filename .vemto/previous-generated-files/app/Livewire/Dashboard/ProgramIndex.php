<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Program;
use Livewire\WithPagination;

class ProgramIndex extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $queryString = ['search', 'sortField', 'sortDirection'];

    public $confirmingDeletion = false;
    public $deletingProgram;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDeletion(string $id)
    {
        $this->deletingProgram = $id;

        $this->confirmingDeletion = true;
    }

    public function delete(Program $program)
    {
        $program->delete();

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
        return Program::query();
    }

    public function render()
    {
        return view('livewire.dashboard.programs.index', [
            'programs' => $this->rows,
        ]);
    }
}
