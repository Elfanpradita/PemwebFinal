<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pengajar;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\PengajarResource\Pages;
use App\Filament\Admin\Resources\PengajarResource\RelationManagers;

class PengajarResource extends Resource
{
    protected static ?string $model = Pengajar::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = "Human Resource Management";

    protected static ?string $navigationLabel = 'Pengajar';

    protected static ?string $modelLabel = 'Pengajar';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->required()
                ->label('User (Pengajar)')
                ->searchable()
                ->options(function () {
                    return \App\Models\User::role('pengajar')
                        ->pluck('name', 'id');
                }),

            Forms\Components\Select::make('departemen_id')
                ->required()
                ->label('Departemen')
                ->relationship('departemen', 'name'),

            Forms\Components\TextInput::make('no_telepon')
                ->tel()
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('jenjang_pendidikan')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('bidang_ajar')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('jenis_kelamin')
                ->label('Jenis Kelamin')
                ->options([
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan',
                ])
                ->required(),

            Forms\Components\TextInput::make('alamat')
                ->required()
                ->maxLength(255),
        ]);
}
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('departemen.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenjang_pendidikan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bidang_ajar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('alamat')
                    ->sortable(),
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPengajars::route('/'),
            'create' => Pages\CreatePengajar::route('/create'),
            'edit' => Pages\EditPengajar::route('/{record}/edit'),
        ];
    }
}
