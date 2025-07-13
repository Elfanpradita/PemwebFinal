<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Homea;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\HomeaResource\Pages;
use App\Filament\Admin\Resources\HomeaResource\RelationManagers;

class HomeaResource extends Resource
{
    protected static ?string $model = Homea::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-circle';

    protected static ?string $navigationGroup = "Company Profile";

    protected static ?string $navigationLabel = 'Home Atas';

    protected static ?string $modelLabel = 'Home Atas';

    public static function canCreate(): bool
{
    return false;
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slogan')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('judul')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desc')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('slogan2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('judul2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desc2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('image')
                    ->label('Image Path')
                    ->required(),
                Forms\Components\TextInput::make('image')
                    ->label('Image Path')
                    ->required(),
                Forms\Components\TextInput::make('image')
                    ->label('Image Path')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slogan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slogan2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc2')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('image1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('image2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListHomeas::route('/'),
            'create' => Pages\CreateHomea::route('/create'),
            'edit' => Pages\EditHomea::route('/{record}/edit'),
        ];
    }
}
