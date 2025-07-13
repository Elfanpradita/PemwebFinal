<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Homeb;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\HomebResource\Pages;
use App\Filament\Admin\Resources\HomebResource\RelationManagers;

class HomebResource extends Resource
{
    protected static ?string $model = Homeb::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?string $navigationGroup = "Company Profile";

    protected static ?string $navigationLabel = 'Home Tengah';

    protected static ?string $modelLabel = 'Home Tengah';

    public static function canCreate(): bool
{
    return false;
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('icon1')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('isi1')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desc1')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('icon2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('isi2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desc2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('icon3')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('isi3')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desc3')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('icon4')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('isi4')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desc4')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('icon1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc4')
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
            ->bulkActions([
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
            'index' => Pages\ListHomebs::route('/'),
            'create' => Pages\CreateHomeb::route('/create'),
            'edit' => Pages\EditHomeb::route('/{record}/edit'),
        ];
    }
}
