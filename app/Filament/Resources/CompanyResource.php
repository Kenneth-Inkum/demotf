<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Company;
use App\Models\Country;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\CompanyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompanyResource\RelationManagers;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Platform Parameters';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company_name')
                    ->label('Company')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('company_size')
                    ->label('Company Size')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(9999)
                    ->required()
                    ->helperText('Enter a number not less than 1'),
                Forms\Components\Select::make('industry_id')
                    ->Relationship('industry', 'industry_name')
                    ->required(),
                Forms\Components\TextInput::make('location')
                    ->label('Location')
                    ->required()
                    ->maxLength(255),
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
                    ->required()
                    ->helperText('Select your country.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Company')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company_size')
                    ->label('Company Size')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('industry.industry_name')
                    ->label('Industry')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Location')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country.country_name')
                    ->label('Country')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('region.region_name')
                    ->label('Region')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('D dS M Y H:i:s'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('D dS M Y H:i:s'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime('D d-M-Y h:i:s'),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
