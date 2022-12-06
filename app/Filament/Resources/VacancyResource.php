<?php

namespace App\Filament\Resources;

use DateTime;
use Filament\Forms;
use Filament\Tables;
use App\Models\Vacancy;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\VacancyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Factories\Relationship;
use App\Filament\Resources\VacancyResource\RelationManagers;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static ?string $navigationIcon = 'heroicon-o-annotation';

    protected static ?string $navigationGroup = 'Platform Parameters';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('company_id')
                    ->Relationship('company', 'company_name')
                    ->required(),
                Select::make('profession_id')
                    ->Relationship('profession', 'profession_name')
                    ->required(),
                Select::make('industry_id')
                    ->Relationship('industry', 'industry_name')
                    ->required(),
                Radio::make('vacancy_type')
                    ->label('Vacancy Type')
                    ->options([
                        'Contract' => 'Contract',
                        'Full-time' => 'Full-time',
                        'Internship' => 'Internship',
                        'Part-Time' => 'Part-Time',
                        'Temporary' => 'Temporary',
                    ])
                    ->required(),
                Radio::make('vacancy_mode')
                    ->label('Vacancy Mode')
                    ->options([
                        'Physical only' => 'Physical only',
                        'Remote only' => 'Remote only',
                        'Physical & Remote' => 'Physical & Remote',
                    ])
                    ->required(),
                TextInput::make('location')
                    ->label('Location')
                    ->required(),
                Textarea::make('vacancy_description')
                    ->label('Description'),
                Textarea::make('vacancy_duty')
                    ->label('Duty'),
                Textarea::make('required_skills')
                    ->label('Required Skills'),
                Textarea::make('vacancy_activity')
                    ->label('Activities'),
                Textarea::make('vacancy_challenge')
                    ->label('Risks'),
                Textarea::make('vacancy_experience')
                    ->label('Required Experience'),
                TextInput::make('minsalary')
                    ->label('Minimum Salary Payable (GHS)')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                TextInput::make('maxsalary')
                    ->label('Maximum Salary Payable (GHS)')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                DateTimePicker::make('closing_date')
                    ->minDate(now())
                    ->displayFormat('D d M Y H:i:s')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('profession.profession_name')
                    ->label('Job Title')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('company.company_name')
                    ->label('Company')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('industry.industry_name')
                    ->label('Industry')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('vacancy_type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('vacancy_mode')
                    ->label('Mode')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Location')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('vacancy_description')
                    ->label('Description')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('vacancy_duty')
                    ->label('Duty')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('required_skills')
                    ->label('Required Skills')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('vacancy_activity')
                    ->label('Activities')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('vacancy_challenge')
                    ->label('Risks')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('vacancy_experience')
                    ->label('Required Experience')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('minsalary')
                    ->label('Minimum Salary Payable')
                    ->money('eur')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('maxsalary')
                    ->label('Minimum Salary Payable')
                    ->money('eur')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('closing_date')
                    ->dateTime('D dS M Y H:i:s'),
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
            'index' => Pages\ListVacancies::route('/'),
            'create' => Pages\CreateVacancy::route('/create'),
            'edit' => Pages\EditVacancy::route('/{record}/edit'),
        ];
    }
}
