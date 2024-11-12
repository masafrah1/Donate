<?php

namespace App\Livewire\Dashboard\Leaders\Forms;

use Livewire\Form;
use App\Models\Leader;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required|string')]
    public $first_name = '';

    #[Rule('required|string')]
    public $family_name = '';

    #[Rule('required|string')]
    public $phone = '059';

    #[Rule('required')]
    public $amount = '';

    #[Rule('required|string')]
    public $country = '';

    #[Rule('required|boolean')]
    public $is_private = '';

    #[Rule('required|string')]
    public $email = '';

    #[Rule('required|string')]
    public $currency = '';

    #[Rule('required')]
    public $number_orphans = '';

    public function save()
    {
        $this->validate();

        $leader = Leader::create($this->except([]));

        $this->reset();

        return $leader;
    }
}
