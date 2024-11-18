<?php

namespace App\Filament\Resources\Panel;

use Filament\Forms;
use Filament\Tables;
use Livewire\Component;
use App\Models\WarForm;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Panel\WarFormResource\Pages;
use App\Filament\Resources\Panel\WarFormResource\RelationManagers;

class WarFormResource extends Resource
{
    protected static ?string $model = WarForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Admin';

    public static function getModelLabel(): string
    {
        return __('crud.warForms.itemTitle');
    }

    public static function getPluralModelLabel(): string
    {
        return __('crud.warForms.collectionTitle');
    }

    public static function getNavigationLabel(): string
    {
        return __('crud.warForms.collectionTitle');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make(['default' => 1])->schema([
                    TextInput::make('identity_number')
                        ->required()
                        ->string()
                        ->autofocus(),

                    Select::make('identity_type')
                        ->required()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'فلسطينية' => 'فلسطينية',
                            'اردنية' => 'اردنية',
                            'اسرائيلية' => 'اسرائيلية',
                            'مصرية' => 'مصرية',
                            'تصريح اقامة' => 'تصريح اقامة',
                            'وثيقة أخرى' => 'وثيقة أخرى',
                        ]),

                    TextInput::make('full_name')
                        ->required()
                        ->string(),

                    DatePicker::make('birth_of_date')
                        ->rules(['date'])
                        ->required()
                        ->native(false),

                    Select::make('marital_status')
                        ->required()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false),

                    TextInput::make('spouse_id_number')
                        ->nullable()
                        ->string(),

                    Select::make('spouse_id_type')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'فلسطينية' => 'فلسطينية',
                            'اردنية' => 'اردنية',
                            'اسرائيلية' => 'اسرائيلية',
                            'مصرية' => 'مصرية',
                            'تصريح اقامة' => 'تصريح اقامة',
                            'وثيقة أخرى' => 'وثيقة أخرى',
                        ]),

                    TextInput::make('spouse_full_name')
                        ->nullable()
                        ->string(),

                    TextInput::make('phone_1')
                        ->nullable()
                        ->string(),

                    TextInput::make('phone_2')
                        ->nullable()
                        ->string(),

                    Select::make('residence_governorate')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'غزة' => 'غزة',
                            'شمال غزة' => 'شمال غزة',
                            'دير البلح' => 'دير البلح',
                            'خانيونس' => 'خانيوس',
                            'رفح' => 'رفح',
                            'الخليل' => 'الخليل',
                            'بيت لحم' => 'بيت لحم',
                            'نابلس' => 'نابلس',
                            'جنين' => 'جنين',
                            'طولكرم' => 'طولكرم',
                            'اريحا' => 'اريحا',
                            'رام الله' => 'رام الله',
                            'قلقيلية' => 'قلقيلية',
                            'سلفيت' => 'سلفيت',
                            'القدس' => 'القدس',
                            'يطا' => 'يطا',
                            'طوباس' => 'طوباس',
                        ]),

                    TextInput::make('residential_area')
                        ->nullable()
                        ->string(),

                    TextInput::make('street')
                        ->nullable()
                        ->string(),

                    TextInput::make('address')
                        ->nullable()
                        ->string(),

                    Select::make('family_members_count')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                            '21' => '21',
                            '22' => '22',
                            '23' => '23',
                            '24' => '24',
                            '25' => '25',
                            '26' => '26',
                            '27' => '27',
                            '28' => '28',
                            '29' => '29',
                            '30' => '30',
                            '31' => '31',
                            '32' => '32',
                            '33' => '33',
                            '34' => '34',
                            '35' => '35',
                            '36' => '36',
                            '37' => '37',
                            '38' => '38',
                            '39' => '39',
                            '40' => '40',
                        ]),

                    Select::make('children_aged_6_18_count')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('children_under_5_years')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_school_students')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_university_students')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_infants')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_people_with_disabilities')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_people_with_chronic_diseases')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_elderly_over_60')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_pregnant_women')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_breastfeeding_women')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('number_of_injured_due_to_war')
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('care_for_non_family_members')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'نعم' => 'نعم',
                            'لا' => 'لا',
                        ]),

                    Select::make(
                        'number_of_children_cared_for_not_in_family_under_18'
                    )
                        ->nullable()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                        ]),

                    Select::make('reason_for_caring_for_children')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'وفاة احد الوالدين او كلاهما' =>
                                'وفاة احد الوالدين او كلاهما',
                            'وفاة كامل العائلة' => 'وفاة كامل العائلة',
                            'مجهولين' => 'مجهولين',
                            'فقدان الاتصال بالوالدين او احداهما' =>
                                'فقدان الاتصال بالوالدين او احداهما',
                            'الاهل خارج القطاع حاليا' =>
                                'الاهل خارج القطاع حاليا',
                            'اخرى' => 'اخرى',
                        ]),

                    Select::make('lost_family_member_during_war')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'نعم' => 'نعم',
                            'لا' => 'لا',
                        ]),

                    Select::make(
                        'relationship_to_family_members_lost_during_war'
                    )
                        ->nullable()
                        ->string()
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'الاب' => 'الاب',
                            'الام' => 'الام',
                            'الاب والام' => 'الاب والام',
                            'أخ' => 'أخ',
                            'اخت' => 'اخت',
                            'ابن' => 'ابن',
                            'ابنة' => 'ابنة',
                            'اقرباء اخرون' => 'اقرباء اخرون',
                        ]),

                    Select::make('urgent_basic_needs_for_family')
                        ->nullable()
                        ->string()
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'المساعدات المالية' => 'المساعدات المالية',
                            'الرعاية الصحية -العلاج' =>
                                'الرعاية الصحية -العلاج',
                            'المسكن -المأوى' => 'المسكن -المأوى',
                            'الملابس' => 'الملابس',
                            'اغطية / فرشات ومخدات' => 'اغطية / فرشات ومخدات',
                            'حليب الاطفال' => 'حليب الاطفال',
                            'الماء' => 'الماء',
                            'مستلزمات صحية (فوط)' => 'مستلزمات صحية (فوط)',
                            'الغذاء' => 'الغذاء',
                            'غاز للطهي' => 'غاز للطهي',
                            'اجار منزل' => 'اجار منزل',
                            'اقساط جامعية' => 'اقساط جامعية',
                            'اقساط مدارس' => 'اقساط مدارس',
                            'أخرى' => 'أخرى',
                        ]),

                    Select::make('secondary_needs_for_family')
                        ->nullable()
                        ->string()
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'المساعدات القانونية' => 'المساعدات القانونية',
                            'المساعدات النفسية' => 'المساعدات النفسية',
                            'مصدر تدفئة' => 'مصدر تدفئة',
                            'وقود' => 'وقود',
                            'مطاعيم الاطفال' => 'مطاعيم الاطفال',
                            'حزم اتصال مجانية وانترنت' =>
                                'حزم اتصال مجانية وانترنت',
                            'أخرى' => 'أخرى',
                        ]),

                    Select::make('sources_of_family_income')
                        ->nullable()
                        ->string()
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'أجور ورواتب من القطاع الحكومي' =>
                                'أجور ورواتب من القطاع الحكومي',
                            'أجور ورواتب من القطاع الخاص' =>
                                'أجور ورواتب من القطاع الخاص',
                            'أجور ورواتب من العمل داخل اراضي 48' =>
                                'أجور ورواتب من العمل داخل اراضي 48',
                            'مشاريع للاسرة غير زراعية' =>
                                'مشاريع للاسرة غير زراعية',
                            'الزراعة وتربية الحيوانات' =>
                                'الزراعة وتربية الحيوانات',
                            'مساعدات اجتماعية' => 'مساعدات اجتماعية',
                            'تحويلات من الخارج' => 'تحويلات من الخارج',
                            'أخرى' => 'أخرى',
                            '' => '',
                            '' => '',
                            '' => '',
                            '' => '',
                            '' => '',
                        ]),

                    TextInput::make('monthly_income_shekels')
                        ->nullable()
                        ->numeric()
                        ->step(1),

                    Select::make('unable_to_use_land_or_properties_due_to_war')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'نعم' => 'نعم',
                            'لا' => 'لا',
                        ]),

                    Select::make('housing_ownership')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'ملك' => 'ملك',
                            'مستأجر غير مفروش' => 'مستأجر غير مفروش',
                            'مستأجر مفروش' => 'مستأجر مفروش',
                            'دون مقابل' => 'دون مقابل',
                            'مقابل عمل' => 'مقابل عمل',
                            'غير ذلك' => 'غير ذلك',
                        ]),

                    Select::make('type_of_housing')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'فيلا' => 'فيلا',
                            'دار' => 'دار',
                            'شقة' => 'شقة',
                            'غرفة مستقلة' => 'غرفة مستقلة',
                            'خيمة' => 'خيمة',
                            'براكية' => 'براكية',
                            'ملجأ / دار مسنين' => 'ملجأ / دار مسنين',
                            'غير ذلك' => 'غير ذلك',
                        ]),

                    Select::make('extent_of_housing_damage_due_to_war')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'ضرر كلي' => 'ضرر كلي',
                            'ضرر جزئي يصلح للسكن' => 'ضرر جزئي يصلح للسكن',
                            'ضرر جزئي لا يصلح للسكن' =>
                                'ضرر جزئي لا يصلح للسكن',
                            'لم يتضرر' => 'لم يتضرر',
                        ]),

                    Select::make(
                        'displaced_due_to_war_and_changed_housing_location'
                    )
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'نعم' => 'نعم',
                            'لا' => 'لا',
                        ]),

                    Select::make('displaced_governorate')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'غزة' => 'غزة',
                            'شمال غزة' => 'شمال غزة',
                            'دير البلح' => 'دير البلح',
                            'خانيونس' => 'خانيونس',
                            'رفح' => 'رفح',
                            'الخليل' => 'الخليل',
                            'بيت لحم' => 'بيت لحم',
                            'نابلس' => 'نابلس',
                            'جنين' => 'جنين',
                            'طولكرم' => 'طولكرم',
                            'اريحا' => 'اريحا',
                            'رام الله' => 'رام الله',
                            'قلقيلية' => 'قلقيلية',
                            'سلفيت' => 'سلفيت',
                            'القدس' => 'القدس',
                            'يطا' => 'يطا',
                            'طوباس' => 'طوباس',
                        ]),

                    TextInput::make('displaced_population_cluster')
                        ->nullable()
                        ->string(),

                    TextInput::make('displaced_street')
                        ->nullable()
                        ->string(),

                    TextInput::make('displaced_address')
                        ->nullable()
                        ->string(),

                    Select::make('displaced_place_of_displacement')
                        ->nullable()
                        ->string()
                        ->searchable()
                        ->preload()
                        ->native(false)
                        ->options([
                            'مدارس الاونروا' => 'مدارس الاونروا',
                            'مدارس حكومية' => 'مدارس حكومية',
                            'منزل للاقارب بمقابل' => 'منزل للاقارب بمقابل',
                            'منزل اقارب بدون مقابل' => 'منزل اقارب بدون مقابل',
                            'منزل اخر للعائلة' => 'منزل اخر للعائلة',
                            'منزل مستأجر' => 'منزل مستأجر',
                            'مستشفيات' => 'مستشفيات',
                            'خيمة' => 'خيمة',
                            'كنيسة' => 'كنيسة',
                            'قاعات' => 'قاعات',
                            'مراكز ايوائية' => 'مراكز ايوائية',
                            'اخرى' => 'اخرى',
                        ]),

                    TextInput::make('account_holder_name')
                        ->nullable()
                        ->string(),

                    TextInput::make('bank_name_branch')
                        ->nullable()
                        ->string(),

                    TextInput::make('account_holder_id_number')
                        ->nullable()
                        ->string(),

                    TextInput::make('account_number')
                        ->nullable()
                        ->string(),

                    TextInput::make('agree_to_share_data_for_assistance')
                        ->nullable()
                        ->string(),

                    Select::make('created_at')
                        ->nullable()
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
                TextColumn::make('identity_number'),

                TextColumn::make('identity_type'),

                TextColumn::make('full_name'),

                TextColumn::make('birth_of_date')->since(),

                TextColumn::make('marital_status'),

                TextColumn::make('spouse_id_number')->label(
                    __('crud.warForms.filament.spouse_id_number.label')
                ),

                TextColumn::make('spouse_id_type'),

                TextColumn::make('spouse_full_name'),

                TextColumn::make('phone_1'),

                TextColumn::make('phone_2'),

                TextColumn::make('residence_governorate'),

                TextColumn::make('residential_area'),

                TextColumn::make('street'),

                TextColumn::make('address'),

                TextColumn::make('family_members_count'),

                TextColumn::make('children_aged_6_18_count'),

                TextColumn::make('children_under_5_years'),

                TextColumn::make('number_of_school_students'),

                TextColumn::make('number_of_university_students'),

                TextColumn::make('number_of_infants'),

                TextColumn::make('number_of_people_with_disabilities'),

                TextColumn::make('number_of_people_with_chronic_diseases'),

                TextColumn::make('number_of_elderly_over_60'),

                TextColumn::make('number_of_pregnant_women'),

                TextColumn::make('number_of_breastfeeding_women'),

                TextColumn::make('number_of_injured_due_to_war'),

                TextColumn::make('care_for_non_family_members'),

                TextColumn::make(
                    'number_of_children_cared_for_not_in_family_under_18'
                ),

                TextColumn::make('reason_for_caring_for_children'),

                TextColumn::make('lost_family_member_during_war'),

                TextColumn::make(
                    'relationship_to_family_members_lost_during_war'
                ),

                TextColumn::make('urgent_basic_needs_for_family'),

                TextColumn::make('secondary_needs_for_family'),

                TextColumn::make('sources_of_family_income'),

                TextColumn::make('monthly_income_shekels'),

                TextColumn::make('unable_to_use_land_or_properties_due_to_war'),

                TextColumn::make('housing_ownership'),

                TextColumn::make('type_of_housing'),

                TextColumn::make('extent_of_housing_damage_due_to_war'),

                TextColumn::make(
                    'displaced_due_to_war_and_changed_housing_location'
                ),

                TextColumn::make('displaced_governorate'),

                TextColumn::make('displaced_population_cluster'),

                TextColumn::make('displaced_street'),

                TextColumn::make('displaced_address'),

                TextColumn::make('displaced_place_of_displacement'),

                TextColumn::make('account_holder_name'),

                TextColumn::make('bank_name_branch'),

                TextColumn::make('account_holder_id_number'),

                TextColumn::make('account_number'),

                TextColumn::make('agree_to_share_data_for_assistance'),

                TextColumn::make('created_at'),
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
            'index' => Pages\ListWarForms::route('/'),
            'create' => Pages\CreateWarForm::route('/create'),
            'view' => Pages\ViewWarForm::route('/{record}'),
            'edit' => Pages\EditWarForm::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
    }
}
