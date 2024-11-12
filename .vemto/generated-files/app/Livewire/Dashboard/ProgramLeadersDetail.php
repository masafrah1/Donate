<?php

namespace App\Livewire\Dashboard;

use Livewire\Form;
use App\Models\Leader;
use Livewire\Component;
use App\Models\Program;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use App\Livewire\Dashboard\Leaders\Forms\CreateDetailForm;
use App\Livewire\Dashboard\Leaders\Forms\UpdateDetailForm;

class ProgramLeadersDetail extends Component
{
    use WithFileUploads, WithPagination;

    public CreateDetailForm|UpdateDetailForm $form;

    public ?Leader $leader;
    public Program $program;

    public $showingModal = false;

    public $detailLeadersSearch = '';
    public $detailLeadersSortField = 'updated_at';
    public $detailLeadersSortDirection = 'desc';

    public $queryString = [
        'detailLeadersSearch',
        'detailLeadersSortField',
        'detailLeadersSortDirection',
    ];

    public $confirmingLeaderDeletion = false;
    public string $deletingLeader;

    public function mount()
    {
        $this->form = new CreateDetailForm($this, 'form');
    }

    public function newLeader()
    {
        $this->form = new CreateDetailForm($this, 'form');
        $this->leader = null;

        $this->showModal();
    }

    public function editLeader(Leader $leader)
    {
        $this->form = new UpdateDetailForm($this, 'form');
        $this->form->setLeader($leader);
        $this->leader = $leader;

        $this->showModal();
    }

    public function showModal()
    {
        $this->showingModal = true;
    }

    public function closeModal()
    {
        $this->showingModal = false;
    }

    public function confirmLeaderDeletion(string $id)
    {
        $this->deletingLeader = $id;

        $this->confirmingLeaderDeletion = true;
    }

    public function deleteLeader(Leader $leader)
    {
        $this->authorize('delete', $leader);

        $leader->delete();

        $this->confirmingLeaderDeletion = false;
    }

    public function save()
    {
        if (empty($this->leader)) {
            $this->authorize('create', Leader::class);
        } else {
            $this->authorize('update', $this->leader);
        }

        $this->form->program_id = $this->program->id;
        $this->form->save();

        $this->closeModal();
    }

    public function sortBy($field)
    {
        if ($this->detailLeadersSortField === $field) {
            $this->detailLeadersSortDirection =
                $this->detailLeadersSortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->detailLeadersSortDirection = 'asc';
        }

        $this->detailLeadersSortField = $field;
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->paginate(5);
    }

    public function getRowsQueryProperty()
    {
        return $this->program
            ->leaders()
            ->orderBy(
                $this->detailLeadersSortField,
                $this->detailLeadersSortDirection
            )
            ->where('first_name', 'like', "%{$this->detailLeadersSearch}%");
    }

    public function render()
    {
        return view('livewire.dashboard.programs.leaders-detail', [
            'detailLeaders' => $this->rows,
        ]);
    }
}
