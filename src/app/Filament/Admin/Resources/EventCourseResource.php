<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EventCourseResource\Pages;
use App\Filament\Admin\Resources\EventCourseResource\RelationManagers;
use App\Models\EventCourse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventCourseResource extends Resource
{
    protected static ?string $model = EventCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = "Learning Management System";

    protected static ?string $navigationLabel = 'Event Course';

    protected static ?string $modelLabel = 'Event Course';

    public static function canAccess(): bool
{
    $user = auth()->user();

    // Super admin dan pengajar tetap bisa
    if ($user->hasRole('super_admin') || $user->hasRole('pengajar')) {
        return true;
    }

    // Murid hanya bisa jika punya kursus
    if ($user->hasRole('murid') && $user->eventCourses()->exists()) {
        return true;
    }

    return false;
}


    public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();
    $user  = auth()->user();

    if ($user->hasRole('super_admin')) {
        return $query; // Super admin bisa akses semua
    }

    if ($user->hasRole('pengajar')) {
        // Ambil ID pengajar-nya
        $pengajarId = $user->pengajar?->id;

        // Kalau belum ada relasi ke tabel pengajars, kosongkan aja
        if (!$pengajarId) {
            return $query->whereRaw('1 = 0');
        }

        // Tampilkan hanya event course yang dia ajar
        return $query->where('pengajar_id', $pengajarId);
    }

    if ($user->hasRole('murid')) {
        // Tampilkan hanya event course yang dia beli
        return $query->whereHas('users', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        });
    }

    // Role lain tidak boleh lihat apa-apa
    return $query->whereRaw('1 = 0');
}


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_event_course')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start')
                    ->required(),
                Forms\Components\DatePicker::make('end')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->prefix('IDR')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('pengajar_id')
                    ->required()
                    ->label('Pengajar')
                    ->relationship('pengajar', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->user?->name),
                Forms\Components\Select::make('employee_id')
                    ->required()
                    ->label('Employee')
                    ->relationship('employee', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->user?->name),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_event_course')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengajar.user.name')
                    ->label('Pengajar')
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.user.name')
                    ->label('Employee')
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
            'index' => Pages\ListEventCourses::route('/'),
            'create' => Pages\CreateEventCourse::route('/create'),
            'edit' => Pages\EditEventCourse::route('/{record}/edit'),
        ];
    }
}
