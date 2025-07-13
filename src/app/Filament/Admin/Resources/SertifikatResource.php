<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SertifikatResource\Pages;
use App\Models\Sertifikat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;

class SertifikatResource extends Resource
{
    protected static ?string $model = Sertifikat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Elearning Management";
    protected static ?string $navigationLabel = 'Sertifikat';
    protected static ?string $modelLabel = 'Sertifikat';

    public static function canAccess(): bool
    {
        $user = auth()->user();

        // Murid tanpa profil tidak bisa akses
        if ($user->hasRole('murid') && !$user->murid()->exists()) {
            return false;
        }

        return true;
    }

    // Batasi data berdasarkan role user
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if ($user->hasRole('murid')) {
            return $query->where('murid_id', $user->murid?->id);
        }

        if ($user->hasRole('pengajar')) {
            return $query->whereRaw('0 = 1'); // kosongkan hasil
        }

        return $query; // Super admin bisa lihat semua
    }

    // Sembunyikan menu dari sidebar untuk pengajar
    public static function shouldRegisterNavigation(): bool
    {
        return !auth()->user()->hasRole('pengajar');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_course_id')
    ->label('Event Course')
    ->required()
    ->relationship('eventCourse', 'name'),

Forms\Components\Select::make('murid_id')
    ->label('Murid')
    ->required()
    ->relationship('murid', 'nama_lengkap'),


                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('upload_sertifikat')
                    ->label('File Sertifikat')
                    ->directory('sertifikat')
                    ->preserveFilenames()
                    ->required()
                    ->downloadable()
                    ->openable()
                    ->previewable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('eventCourse.name')
                    ->label('Event Course')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('murid.nama_lengkap')
                    ->label('Murid')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('upload_sertifikat')
                    ->label('File')
                    ->url(fn (Sertifikat $record) => \Storage::url($record->upload_sertifikat))
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
            'index' => Pages\ListSertifikats::route('/'),
            'create' => Pages\CreateSertifikat::route('/create'),
            'edit' => Pages\EditSertifikat::route('/{record}/edit'),
        ];
    }
}
