<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Murid;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\MuridResource\Pages;

class MuridResource extends Resource
{
    protected static ?string $model = Murid::class;

    protected static ?string $navigationIcon  = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Learning Management System';
    protected static ?string $navigationLabel = 'Murid';
    protected static ?string $modelLabel      = 'Murid';

    /* -----------------------------------------------------------------
     |  Akses menu / halaman
     * -----------------------------------------------------------------*/
    public static function canAccess(): bool
    {
        $user = auth()->user();

        // Blokir pengajar
        if ($user->hasRole('pengajar')) {
            return false;
        }

        // Blokir murid jika belum beli kursus
        if ($user->hasRole('murid') && !$user->eventCourses()->exists()) {
            return false;
        }

        return true;
    }

    /* -----------------------------------------------------------------
     |  Query data
     * -----------------------------------------------------------------*/
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user  = auth()->user();

        if ($user->hasRole('murid')) {
            $query->where('user_id', $user->id);   // Murid hanya lihat miliknya
        }

        return $query;
    }

    /* -----------------------------------------------------------------
     |  Batasan membuat data
     * -----------------------------------------------------------------*/
    public static function canCreate(): bool
    {
        $user = auth()->user();

        // Murid cuma boleh buat satu profil
        if ($user->hasRole('murid')) {
            return !Murid::where('user_id', $user->id)->exists();
        }

        return true; // Role lain bebas
    }

    /* -----------------------------------------------------------------
     |  Form
     * -----------------------------------------------------------------*/
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('user_id')
                ->default(auth()->id())
                ->required(),

            Forms\Components\TextInput::make('nama_lengkap')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('no_telepon')
                ->tel()
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('umur')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('tempat_tanggal_lahir')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('alamat')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('jenjang_pendidikan')
                ->required()
                ->maxLength(255),
        ]);
    }

    /* -----------------------------------------------------------------
     |  Table
     * -----------------------------------------------------------------*/
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->sortable(),
                Tables\Columns\TextColumn::make('nama_lengkap')->searchable(),
                Tables\Columns\TextColumn::make('no_telepon')->searchable(),
                Tables\Columns\TextColumn::make('umur')->searchable(),
                Tables\Columns\TextColumn::make('tempat_tanggal_lahir')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->searchable(),
                Tables\Columns\TextColumn::make('jenjang_pendidikan')->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    /* -----------------------------------------------------------------
     |  Halaman
     * -----------------------------------------------------------------*/
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMurids::route('/'),
            'create' => Pages\CreateMurid::route('/create'),
            'edit'   => Pages\EditMurid::route('/{record}/edit'),
        ];
    }
}
