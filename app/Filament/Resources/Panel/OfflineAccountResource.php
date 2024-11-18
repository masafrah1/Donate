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
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

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
                            'بنك فلسطين' => 'بنك فلسطين',
                            'البنك الوطني الفلسطيني (PNB)' => 'البنك الوطني الفلسطيني (PNB)',
                            'بنك القدس' => 'بنك القدس',
                            'بنك فلسطين الإسلامي' => 'بنك فلسطين الإسلامي',
                            'بنك القاهرة عمان' => 'بنك القاهرة عمان',
                            'البنك الإسلامي للتنمية' => 'البنك الإسلامي للتنمية',
                            'البنك العربي' => 'البنك العربي',
                            'البنك الإسلامي للتنمية (IsDB)' => 'البنك الإسلامي للتنمية (IsDB)',
                            'البنك التجاري الفلسطيني' => 'البنك التجاري الفلسطيني',
                            'بنك الإسكان' => 'بنك الإسكان',
                            'بنك الأردن' => 'بنك الأردن',
                        ]),

                    TextInput::make('account_number')
                        ->required()
                        ->string(),
                    TextInput::make('swift_code')
                        ->required()
                        ->string(),
                    TextInput::make('iban_jod')
                        ->string(),
                    TextInput::make(name: 'iban_usd')
                        ->string(),
                    TextInput::make(name: 'iban_ils')
                        ->string(),
                    TextInput::make(name: 'iban_eur')
                        ->string(),

                    TextInput::make('beneficiary')
                        ->required()
                        ->string(),
                    Select::make(name: 'program_id')
                        ->required()
                        ->relationship('program', 'title')
                        ->searchable()
                        ->preload()
                        ->native(false),
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
                TextColumn::make('account_number'),

                TextColumn::make('swift_code')->limit(255),

                TextColumn::make('iban_jod'),
                TextColumn::make('iban_usd'),
                TextColumn::make('iban_ils'),
                TextColumn::make('iban_eur'),

                TextColumn::make('beneficiary'),

                TextColumn::make('program.title'),
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
                    ExportBulkAction::make()
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
