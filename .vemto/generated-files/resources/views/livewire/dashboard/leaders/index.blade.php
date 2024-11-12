<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.leaders.collectionTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.leaders.collectionTitle') }}..."
        />

        @can('create', App\Models\Leader::class)
        <a wire:navigate href="{{ route('dashboard.leaders.create') }}">
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
                wire:click="delete({{ $deletingLeader }})"
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
                <x-ui.table.header for-crud wire:click="sortBy('first_name')"
                    >{{ __('crud.leaders.inputs.first_name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('family_name')"
                    >{{ __('crud.leaders.inputs.family_name.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('phone')"
                    >{{ __('crud.leaders.inputs.phone.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('email')"
                    >{{ __('crud.leaders.inputs.email.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('currency')"
                    >{{ __('crud.leaders.inputs.currency.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('amount')"
                    >{{ __('crud.leaders.inputs.amount.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header
                    for-crud
                    wire:click="sortBy('number_orphans')"
                    >{{ __('crud.leaders.inputs.number_orphans.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('country')"
                    >{{ __('crud.leaders.inputs.country.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('is_private')"
                    >{{ __('crud.leaders.inputs.is_private.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($leaders as $leader)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $leader->first_name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $leader->family_name }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $leader->phone }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $leader->email }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $leader->currency }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $leader->amount }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $leader->number_orphans }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $leader->country }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $leader->is_private }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $leader)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.leaders.edit', $leader) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $leader)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $leader->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="10"
                        >No {{ __('crud.leaders.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $leaders->links() }}</div>
    </x-ui.container.table>
</div>
