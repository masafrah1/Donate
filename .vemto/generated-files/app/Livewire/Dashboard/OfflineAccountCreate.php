<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\OfflineAccounts\Forms\CreateForm;

class OfflineAccountCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;

    public function mount()
    {
    }

    public function save()
    {
        $this->authorize('create', OfflineAccount::class);

        $this->validate();

        $offlineAccount = $this->form->save();

        return redirect()->route(
            'dashboard.offline-accounts.edit',
            $offlineAccount
        );
    }

    public function render()
    {
        return view('livewire.dashboard.offline-accounts.create', []);
    }
}
