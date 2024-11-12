<?php

namespace App\Livewire\Dashboard\Programs\Forms;

use Livewire\Form;
use App\Models\Program;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required')]
    public $pay_link = '';

    public function save()
    {
        $this->validate();

        $program = Program::create($this->except([]));

        $this->reset();

        return $program;
    }
}
