<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JawabanTaskResource\Pages;
use App\Models\JawabanTask;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;

class JawabanTaskResource extends Resource
{
    protected static ?string $model = JawabanTask::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationGroup = "Elearning Management";

    protected static ?string $navigationLabel = 'Task Jawaban';

    protected static ?string $modelLabel = 'Task Jawaban';

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

    if ($user->hasRole('murid')) {
        // Cek berdasarkan murid_id yang terkait ke user
        return $query->where('murid_id', $user->murid?->id);
    }

    if ($user->hasRole('pengajar')) {
        // Ambil ID pengajar dari relasi user -> pengajar
        $pengajarId = $user->pengajar?->id;

        return $query->whereHas('task.kegiatan.eventCourse', function ($q) use ($pengajarId) {
            $q->where('pengajar_id', $pengajarId);
        });
    }

    return $query;
}
    public static function form(Form $form): Form
{
    $user = auth()->user();

    return $form->schema(array_filter([
        // Field ini hanya bisa diisi saat create (murid yang upload)
        $user->hasRole('murid') ? Select::make('task_id')
            ->label('Tugas yang Ditugaskan')
            ->required()
            ->options(function () use ($user) {
                return \App\Models\Task::whereHas('kegiatan.eventCourse.users', function ($query) use ($user) {
                        $query->where('users.id', $user->id);
                    })
                    ->pluck('title', 'id');
            }) : null,

        $user->hasRole('murid') ? Forms\Components\Hidden::make('murid_id')
            ->default(fn () => $user->murid?->id)
            ->required() : null,

        $user->hasRole('murid') ? Forms\Components\FileUpload::make('upload_task')
            ->label('Upload Jawaban')
            ->required()
            ->disk('public')
            ->preserveFilenames()
            ->visibility('public')
            ->directory('jawaban_tasks')
            ->maxSize(10240) : null,

        // Field ini hanya bisa diedit oleh pengajar
        $user->hasRole('pengajar') ? Forms\Components\TextInput::make('nilai_murid')
            ->label('Nilai Murid')
            ->numeric()
            ->required() : null,
    ]));
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('task.title')
                    ->label('Tugas'),
                Tables\Columns\TextColumn::make('murid.nama_lengkap')
                    ->label('Murid'),
                Tables\Columns\TextColumn::make('upload_task')
                    ->label('Upload Jawaban')
                    ->url(fn ($record) => asset('storage/' . $record->upload_task))
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => basename($state))
                    ->searchable(),
		        Tables\Columns\TextColumn::make('nilai_murid')
                    ->label('Nilai Murid'),
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
            'index' => Pages\ListJawabanTasks::route('/'),
            'create' => Pages\CreateJawabanTask::route('/create'),
            'edit' => Pages\EditJawabanTask::route('/{record}/edit'),
        ];
    }
}
