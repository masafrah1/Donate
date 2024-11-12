<?php

namespace App\Livewire\Dashboard\OfflineAccounts\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\OfflineAccount;

class CreateForm extends Form
{
    #[Rule('required|string')]
    public $bank_name = '';

    #[Rule('required')]
    public $swift_code = '';

    #[Rule('required|string')]
    public $iban = '';

    #[Rule('required|string')]
    public $beneficiary = '';

    public function save()
    {
        $this->validate();

        $offlineAccount = OfflineAccount::create($this->except([]));

        $this->reset();

        return $offlineAccount;
    }
}
