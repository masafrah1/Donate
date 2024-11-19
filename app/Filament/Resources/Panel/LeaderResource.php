<?php

namespace App\Filament\Resources\Panel;

use Filament\Forms;
use Filament\Tables;
use App\Models\Leader;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Panel\LeaderResource\Pages;
use App\Filament\Resources\Panel\LeaderResource\RelationManagers;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class LeaderResource extends Resource
{
    protected static ?string $model = Leader::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Admin';

    public static function getModelLabel(): string
    {
        return __('crud.leaders.itemTitle');
    }

    public static function getPluralModelLabel(): string
    {
        return __('crud.leaders.collectionTitle');
    }

    public static function getNavigationLabel(): string
    {
        return __('crud.leaders.collectionTitle');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make(['default' => 1])->schema([
                    Checkbox::make('donor_type')
                    ->label('Is Company')
                    ->nullable()
                    ->default(false)
                    ->reactive(), // يجعل الحقل تفاعليًا لتحديث العرض عند تغييره,

                TextInput::make('first_name')
                    ->nullable()
                    ->string()
                    ->autofocus()
                    ->visible(fn (callable $get) => !$get('donor_type')) // يظهر فقط إذا لم يكن "Company"
                    ->required(fn (callable $get) => !$get('donor_type')), // مطلوب فقط إذا لم يكن "Company"

                TextInput::make('family_name')
                    ->nullable()
                    ->string()
                    ->visible(fn (callable $get) => !$get('donor_type')) // يظهر فقط إذا لم يكن "Company"
                    ->required(fn (callable $get) => !$get('donor_type')), // مطلوب فقط إذا لم يكن "Company"

                TextInput::make('company_name')
                    ->nullable()
                    ->string()
                    ->visible(fn (callable $get) => $get('donor_type')) // يظهر فقط إذا كان "Company"
                    ->required(fn (callable $get) => $get('donor_type')), // مطلوب فقط إذا كان "Company"


                    TextInput::make('phone')
                        ->required()
                        ->string(),

                    TextInput::make('email')
                        ->required()
                        ->string()
                        ->email(),

                    Select::make('currency')
                        ->required()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'USD' => 'USD',
                            'ILS' => 'ILS',
                            'EUR' => 'EUR',
                        ]),

                    TextInput::make('amount')
                        ->required()
                        ->numeric(),

                    TextInput::make('number_orphans')
                        ->required()
                        ->numeric()
                        ->step(1),

                    Select::make('payment_method')
                        ->required()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'online' => 'Online',
                            'offline' => 'Offline',
                        ]),

                    Select::make('program_id')
                        ->required()
                        ->relationship('program', 'title')
                        ->searchable()
                        ->preload()
                        ->native(false),

                    Select::make('country')
                        ->required()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'PS' => 'Palestine',
                        ]),

                    Checkbox::make('is_private')
                        ->rules(['boolean'])
                        ->nullable()
                        ->inline(),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                TextColumn::make('donor_type') ->label('Donor Type') // Column label
                ->getStateUsing(fn ($record) => $record->donor_type ? 'Company' : 'Personal'),

                TextColumn::make('first_name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('family_name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('company_name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email'),

                TextColumn::make('currency'),

                TextColumn::make('amount'),

                TextColumn::make('number_orphans'),

                TextColumn::make('payment_method'),

                TextColumn::make('program.title'),

                TextColumn::make('country'),

                CheckboxColumn::make('is_private'),
            ])
            ->filters([Tables\Filters\TrashedFilter::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeaders::route('/'),
            'create' => Pages\CreateLeader::route('/create'),
            'view' => Pages\ViewLeader::route('/{record}'),
            'edit' => Pages\EditLeader::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
    }
}
