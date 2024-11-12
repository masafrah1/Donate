<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.offlineAccounts.collectionTitle')
            }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.offlineAccounts.collectionTitle') }}..."
        />

        @can('create', App\Models\OfflineAccount::class)
        <a
            wire:navigate
            href="{{ route('dashboard.offline-accounts.create') }}"
        >
            <x-ui.button>New</x-ui.button>
        </a>
        @endcan
    </div>

    {{-- Delete Modal --}}
    <x-ui.modal.confirm wire:model="confirmingDeletion">
        <x-slot name="title"> {{ __('Delete') }} </x-slot>

        <x-slot name="content"> {{ __('Are you sure?') }} </x-slot>

        <x-slot name="footer">
            <x-ui.button
                wire:click="$toggle('confirmingDeletion')"
                wire:loading.attr="disabled"
            >
                {{ __('Cancel') }}
            </x-ui.button>

            <x-ui.button.danger
                class="ml-3"
                wire:click="delete({{ $deletingOfflineAccount }})"
                wire:loading.attr="disabled"
            >
                {{ __('Delete') }}
            </x-ui.button.danger>
        </x-slot>
    </x-ui.modal.confirm>

    {{-- Index Table --}}
    <x-ui.container.table>
        <x-ui.table>
            <x-slot name="head">
                <x-ui.table.header for-crud wire:click="sortBy('bank_name')"
                    >{{ __('crud.offlineAccounts.inputs.bank_name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('swift_code')"
                    >{{ __('crud.offlineAccounts.inputs.swift_code.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('iban')"
                    >{{ __('crud.offlineAccounts.inputs.iban.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('beneficiary')"
                    >{{ __('crud.offlineAccounts.inputs.beneficiary.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($offlineAccounts as $offlineAccount)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $offlineAccount->bank_name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $offlineAccount->swift_code }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $offlineAccount->iban }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $offlineAccount->beneficiary }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $offlineAccount)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.offline-accounts.edit', $offlineAccount) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $offlineAccount)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $offlineAccount->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="5"
                        >No {{ __('crud.offlineAccounts.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $offlineAccounts->links() }}</div>
    </x-ui.container.table>
</div>
