<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GajiPengajarResource\Pages;
use App\Filament\Admin\Resources\GajiPengajarResource\RelationManagers;
use App\Models\GajiPengajar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GajiPengajarResource extends Resource
{
    protected static ?string $model = GajiPengajar::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = "Management Absensi dan Gaji Pengajar";

    protected static ?string $navigationLabel = 'Gaji Pengajar';

    protected static ?string $modelLabel = 'Gaji Pengajar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_course_id')
                    ->label('Event Course')
                    ->relationship('eventCourse', 'name'),
                Forms\Components\TextInput::make('gaji_pokok')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('eventCourse.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('gaji_pokok')
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
            'index' => Pages\ListGajiPengajars::route('/'),
            'create' => Pages\CreateGajiPengajar::route('/create'),
            'edit' => Pages\EditGajiPengajar::route('/{record}/edit'),
        ];
    }
}
