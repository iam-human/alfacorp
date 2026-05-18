<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Konten Halaman';
    protected static ?string $label = 'Hero Section';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Content')
                    ->schema([
                        Forms\Components\TextInput::make('headline')->required()->maxLength(255),
                        Forms\Components\TextInput::make('subheadline')->required()->maxLength(255),
                        Forms\Components\FileUpload::make('background_image')
                            ->image()
                            ->disk('public')
                            ->directory('uploads/heroes')
                            ->maxSize(2048),
                        Forms\Components\Toggle::make('is_active')->default(true),
                    ]),
                Forms\Components\Section::make('Call To Action')
                    ->schema([
                        Forms\Components\TextInput::make('cta_primary_text')->required()->maxLength(255),
                        Forms\Components\TextInput::make('cta_primary_url')->required()->maxLength(255),
                        Forms\Components\TextInput::make('cta_secondary_text')->maxLength(255),
                        Forms\Components\TextInput::make('cta_secondary_url')->maxLength(255),
                    ])->columns(2),
                Forms\Components\Section::make('Statistics')
                    ->schema([
                        Forms\Components\TextInput::make('stat_1_number')->maxLength(255),
                        Forms\Components\TextInput::make('stat_1_label')->maxLength(255),
                        Forms\Components\TextInput::make('stat_2_number')->maxLength(255),
                        Forms\Components\TextInput::make('stat_2_label')->maxLength(255),
                        Forms\Components\TextInput::make('stat_3_number')->maxLength(255),
                        Forms\Components\TextInput::make('stat_3_label')->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('headline')->searchable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}
