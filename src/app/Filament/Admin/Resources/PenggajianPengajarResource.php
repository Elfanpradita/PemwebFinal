<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PenggajianPengajarResource\Pages;
use App\Filament\Admin\Resources\PenggajianPengajarResource\RelationManagers;
use App\Models\PenggajianPengajar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenggajianPengajarResource extends Resource
{
    protected static ?string $model = PenggajianPengajar::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = "Management Absensi dan Gaji Pengajar";

    protected static ?string $navigationLabel = 'Penggajian Pengajar';

    protected static ?string $modelLabel = 'Penggajian Pengajar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('gaji_pengajar_id')
                    ->label('Gaji Pengajar')
                    ->relationship('eventCourse', 'name'),
                Forms\Components\TextInput::make('pengajar_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('periode_awal')
                    ->required(),
                Forms\Components\DatePicker::make('periode_akhir')
                    ->required(),
                Forms\Components\TextInput::make('total_pertemuan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total_gaji')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_transfer'),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('status')
                    ->maxLength(255)
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gajiPengajar.gaji_pokok')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pengajar.user.name')
                    ->label('Nama Pengajar')
                    ->getStateUsing(fn ($record) => $record->pengajar?->user?->name ?? '-')
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode_awal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode_akhir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_pertemuan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_gaji')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_transfer')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListPenggajianPengajars::route('/'),
            'create' => Pages\CreatePenggajianPengajar::route('/create'),
            'edit' => Pages\EditPenggajianPengajar::route('/{record}/edit'),
        ];
    }
}
