<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ModulResource\Pages;
use App\Models\Modul;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Facades\Filament;

class ModulResource extends Resource
{
    protected static ?string $model = Modul::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Elearning Management';
    protected static ?string $navigationLabel = 'Modul';
    protected static ?string $modelLabel = 'Modul';

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
                $query->whereHas('kegiatan.eventCourse.pengajar.user', function ($q) use ($user) {
                    $q->where('id', $user->id);
                });
            } elseif ($user->hasRole('murid')) {
                $query->whereHas('kegiatan.eventCourse.users', function ($q) use ($user) {
                    $q->where('users.id', $user->id);
                });
            }
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
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
                ->maxLength(255),

            Forms\Components\FileUpload::make('upload_modul')
                ->disk('public')
                ->directory('moduls')
                ->preserveFilenames()
                ->visibility('public')
                ->maxSize(10240)
                ->required(),
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
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('upload_modul')
                    ->label('Modul')
                    ->url(fn ($record) => asset('storage/' . $record->upload_modul))
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => basename($state)),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListModuls::route('/'),
            'create' => Pages\CreateModul::route('/create'),
            'edit' => Pages\EditModul::route('/{record}/edit'),
        ];
    }
}
