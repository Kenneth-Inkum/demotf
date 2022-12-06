<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Country;
use App\Models\Factory;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\FactoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FactoryResource\RelationManagers;

class FactoryResource extends Resource
{
    protected static ?string $model = Factory::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Talent Factory';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('firstname')
                    ->label('First Name')
                    ->required(),
                TextInput::make('lastname')
                    ->label('Last Name')
                    ->required(),
                TextInput::make('othername')
                    ->label('Other Name'),
                DatePicker::make('dob')
                    ->label('Date of Birth')
                    ->displayFormat('D d M Y')
                    ->required(),
                Radio::make('gender')
                    ->label('Gender')
                    ->options([
                        'Male' => 'Male',
                        'Female' => 'Female',
                    ]),
                Radio::make('factory_mode')
                    ->label('Preferred Mode of Work')
                    ->options([
                        'Physical only' => 'Physical only',
                        'Remote only' => 'Remote only',
                        'Physical & Remote' => 'Physical & Remote'
                    ]),

                TextInput::make('phonenumber')
                    ->label('Phone Number')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->required(),
                TextInput::make('location')
                    ->label('Location')
                    ->required(),
                Forms\Components\Select::make('country_id')
                    ->options(Country::all()->pluck('country_name', 'id')->toArray())
                    ->label('Country')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('region_id', null,)),
                Forms\Components\Select::make('region_id')
                    ->label('Region')
                    ->options(function (callable $get) {
                        $country = Country::find($get('country_id'));
                        if (!$country) {
                            return null;
                        }
                        return $country->region->pluck('region_name', 'id');
                    })
                    ->reactive()
                    ->required(),
                Forms\Components\Select::make('education_level')
                    ->label('Education Level')
                    ->required()
                    ->options([
                        'No Formal Education' => 'No Formal Education',
                        'Primary School' => 'Primary School',
                        'Lower Secondary School (JHS)' => 'Lower Secondary School (JHS)',
                        'Higher Secondary School (SHS)' => 'Higher Secondary School (SHS)',
                        'Higher National Diploma (HND)' => 'Higher National Diploma (HND)',
                        'Technical & Vocational (TVET)' => 'Technical & Vocational (TVET)',
                        'Undergraduate Degree (Bachelor\'s)' => 'Undergraduate Degree (Bachelor\'s)',
                        'Postgraduate Degree (Master\'s)' => 'Postgraduate Degree (Master\'s)',
                        'Doctorate Degree (PhD/Prof.)' => 'Doctorate Degree (PhD/Prof.)',
                    ]),
                Forms\Components\TextInput::make('course_studied')
                    ->label('Course Studied')
                    ->required(),
                Select::make('profession_id')
                    ->relationship('profession', 'profession_name')
                    ->label('Profession')
                    ->required(),
                Select::make('industry_id')
                    ->relationship('industry', 'industry_name')
                    ->label('Industry')
                    ->required(),
                TextInput::make('user_id')
                    ->default(auth()->user()->id)
                    ->unique()
                    ->disabled()
                    ->label('User ID')
                    ->required(),
                Textarea::make('factory_about_me')
                    ->label('About Me'),
                Textarea::make('factory_experience')
                    ->label('Experiences'),
                Textarea::make('factory_interest')
                    ->label('Interests'),
                Textarea::make('factory_achievement')
                    ->label('Achievements'),
                TextInput::make('factory_expectedsalary')
                    ->label('Expected Salary (GHS)')
                    ->numeric()
                    ->minValue(1)
                    ->required()
                    ->helperText('NB: We won\'t share this information with your prospective employer.'),
                FileUpload::make('factory_resume')
                    ->label('Upload your resume')
                    ->directory('form-attachments/resume/')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(10240), //10MB
                FileUpload::make('factory_certificate')
                    ->label('Upload your certificate')
                    ->directory('form-attachments/certificate/')
                    ->acceptedFileTypes(['application/zip'])
                    ->image()
                    ->maxSize(10240), //10MB

                FileUpload::make('factory_image')
                    ->label('Upload your Profile Photo')
                    ->directory('form-attachments/profile/')
                    ->image()
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('600')
                    ->imageResizeTargetHeight('600')
                    ->imagePreviewHeight('250')
                    ->loadingIndicatorPosition('left')
                    ->panelAspectRatio('1:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left')
                    ->maxSize(3072), //3MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('firstname')
                    ->label('First Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('lastname')
                    ->label('Last Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('othername')
                    ->label('Other Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('dob')
                    ->label('Date of Birth')
                    ->date('D dS M Y')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('gender')
                    ->label('Gender')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phonenumber')
                    ->label('phone Number')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Location')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('country.country_name')
                    ->label('Country')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('region.region_name')
                    ->label('Region')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('education_level')
                    ->label('Level of Education')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('course_studied')
                    ->label('Course Studied')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('factory_about_me')
                    ->label('About Me')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('factory_experience')
                    ->label('Experiences')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('factory_interest')
                    ->label('Interests')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('factory_achievement')
                    ->label('Achievements')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('factory_expectedsalary')
                    ->label('Expected Salary')
                    ->money('eur')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('factory_resume')
                    ->label('Resume')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('factory_mode')
                    ->label('Mode of Work')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('factory_certificate')
                    ->label('Certificate')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('profession.profession_name')
                    ->label('Job Title')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('industry.industry_name')
                    ->label('Industry')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('user.id')
                    ->label('User ID')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('factory_image')
                    ->label('Profile Photo')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('created_at')
                    ->dateTime('D dS M Y H:i:s'),
                TextColumn::make('updated_at')
                    ->dateTime('D dS M Y H:i:s'),
                TextColumn::make('deleted_at')
                    ->dateTime('D dS M Y H:i:s'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFactories::route('/'),
            'create' => Pages\CreateFactory::route('/create'),
            'edit' => Pages\EditFactory::route('/{record}/edit'),
        ];
    }
}
