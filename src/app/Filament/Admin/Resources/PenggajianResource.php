<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Penggajian;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\PenggajianResource\Pages;
use App\Filament\Admin\Resources\PenggajianResource\RelationManagers;

class PenggajianResource extends Resource
{
    protected static ?string $model = Penggajian::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = "Human Resource Management";

    protected static ?string $navigationLabel = 'Gaji';

    protected static ?string $modelLabel = 'Gaji';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->required()
                    ->label('Karyawan')
                    ->relationship('employee', 'nama_lengkap'),
                Forms\Components\DatePicker::make('periode_awal')
                    ->required(),
                Forms\Components\DatePicker::make('periode_akhir')
                    ->required(),
                Forms\Components\TextInput::make('total_gaji')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_transfer')
                    ->default(null),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('status')
                    ->label('Status Pembayaran')
                    ->options([
                        'dibayar' => 'Dibayar',
                        'belum_dibayar' => 'Belum Dibayar',
                        ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.nama_lengkap')
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode_awal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode_akhir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_gaji')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_transfer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListPenggajians::route('/'),
            'create' => Pages\CreatePenggajian::route('/create'),
            'edit' => Pages\EditPenggajian::route('/{record}/edit'),
        ];
    }
}