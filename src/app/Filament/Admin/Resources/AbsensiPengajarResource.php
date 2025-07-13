<?php

namespace App\Filament\Admin\Resources;

use App\Models\AbsensiPengajar;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\AbsensiPengajarResource\Pages;

class AbsensiPengajarResource extends Resource
{
    protected static ?string $model = AbsensiPengajar::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Management Absensi dan Gaji Pengajar';
    protected static ?string $navigationLabel = 'Absensi Pengajar';
    protected static ?string $modelLabel = 'Absensi Pengajar';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('event_course_id')
                ->label('Event Course')
                ->relationship('eventCourse', 'name')
                ->required(),

            Forms\Components\Select::make('kegiatan_id')
                ->label('Kegiatan')
                ->relationship('kegiatan', 'nama')
                ->required(),

            Forms\Components\Select::make('pengajar_id')
                ->label('Nama Pengajar')
                ->relationship('pengajar', 'id')
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->user->name ?? 'Tanpa Nama')
                ->preload()
                ->required(),

            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'Hadir' => 'Hadir',
                    'Cuti' => 'Cuti',
                ])
                ->required(),

            Forms\Components\TextInput::make('keterangan')
                ->label('Keterangan')
                ->maxLength(255)
                ->default(null),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('pengajar.user.name')
                ->label('Nama Pengajar')
                ->getStateUsing(fn ($record) => $record->pengajar?->user?->name ?? '-')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('kegiatan.nama')
                ->label('Kegiatan')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('status')
                ->sortable(),

            Tables\Columns\TextColumn::make('keterangan')
                ->searchable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Diperbarui')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['pengajar.user', 'kegiatan', 'eventCourse']);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbsensiPengajars::route('/'),
            'create' => Pages\CreateAbsensiPengajar::route('/create'),
            'edit' => Pages\EditAbsensiPengajar::route('/{record}/edit'),
        ];
    }
}
