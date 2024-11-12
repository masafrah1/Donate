<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Programs\Forms\CreateForm;

class ProgramCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->authorize('create', Program::class);

        $this->validate();

        $program = $this->form->save();

        return redirect()->route('dashboard.programs.edit', $program);
    }

    public function render()
    {
        return view('livewire.dashboard.programs.create', []);
    }
}
