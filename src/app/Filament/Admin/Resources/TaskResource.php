<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TaskResource\Pages;
use App\Filament\Admin\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = "Elearning Management";

    protected static ?string $navigationLabel = 'Task';

    protected static ?string $modelLabel = 'Task';

    public static function canAccess(): bool
{
    $user = auth()->user();

    // Cek apakah user murid dan belum punya profil murid
    if ($user->hasRole('murid') && !$user->murid()->exists()) {
        return false;
    }

    return true;
}


    public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();
    $user = auth()->user();

    $panel = Filament::getCurrentPanel();
    if ($panel?->getId() === 'edu') {
        if ($user->hasRole('pengajar')) {
            // Task dari kegiatan yang dia ajar (via kegiatan -> eventCourse -> pengajar -> user)
            $query->whereHas('kegiatan.eventCourse.pengajar.user', function ($q) use ($user) {
                $q->where('id', $user->id);
            });
        } elseif ($user->hasRole('murid')) {
            // Task dari kegiatan yang eventCourse-nya pernah dibeli user ini
            $query->whereHas('kegiatan.eventCourse.users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        }
    }

    return $query;
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kegiatan_id')
                ->label('Kegiatan')
                ->required()
                ->options(function () {
                    $user = auth()->user();
                    $pengajarId = $user->pengajar?->id;

                    if (!$pengajarId) {
                        return [];
                    }

                    return \App\Models\Kegiatan::whereHas('eventCourse', function ($query) use ($pengajarId) {
                        $query->where('pengajar_id', $pengajarId);
                    })->pluck('nama', 'id');
                }),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kegiatan.nama')
                    ->label('Kegiatan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
