<?php

namespace App\Livewire\Dashboard\Leaders\Forms;

use Livewire\Form;
use App\Models\Leader;
use Livewire\Attributes\Rule;

class CreateDetailForm extends Form
{
    public $program_id = null;

    #[Rule('required|string')]
    public $first_name = '';

    #[Rule('required|string')]
    public $family_name = '';

    #[Rule('required|string')]
    public $phone = '';

    #[Rule('required|string')]
    public $email = '';

    #[Rule('required|string')]
    public $currency = '';

    #[Rule('required')]
    public $amount = '';

    #[Rule('required|string')]
    public $country = '';

    #[Rule('required|boolean')]
    public $is_private = '';

    #[Rule('nullable')]
    public $number_orphans = '';

    #[Rule('required|string')]
    public $payment_method = '';

    public function save()
    {
        $this->validate();

        $leader = Leader::create($this->except([]));

        $this->reset();

        return $leader;
    }
}
