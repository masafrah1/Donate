<?php

namespace App\Filament\Resources\Panel;

use Filament\Forms;
use Filament\Tables;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\OfflineAccount;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Panel\OfflineAccountResource\Pages;
use App\Filament\Resources\Panel\OfflineAccountResource\RelationManagers;

class OfflineAccountResource extends Resource
{
    protected static ?string $model = OfflineAccount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Admin';

    public static function getModelLabel(): string
    {
        return __('crud.offlineAccounts.itemTitle');
    }

    public static function getPluralModelLabel(): string
    {
        return __('crud.offlineAccounts.collectionTitle');
    }

    public static function getNavigationLabel(): string
    {
        return __('crud.offlineAccounts.collectionTitle');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make(['default' => 1])->schema([
                    Select::make('bank_name')
                        ->required()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'Bank of Palestine' => 'Bank of Palestine',
                        ]),

                    RichEditor::make('swift_code')
                        ->required()
                        ->fileAttachmentsVisibility('public'),

                    TextInput::make('iban')
                        ->required()
                        ->string(),

                    TextInput::make('beneficiary')
                        ->required()
                        ->string(),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                TextColumn::make('bank_name'),

                TextColumn::make('swift_code')->limit(255),

                TextColumn::make('iban'),

                TextColumn::make('beneficiary'),
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
            'index' => Pages\ListOfflineAccounts::route('/'),
            'create' => Pages\CreateOfflineAccount::route('/create'),
            'view' => Pages\ViewOfflineAccount::route('/{record}'),
            'edit' => Pages\EditOfflineAccount::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
    }
}
