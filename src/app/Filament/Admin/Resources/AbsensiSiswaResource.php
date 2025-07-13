<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AbsensiSiswaResource\Pages;
use App\Filament\Admin\Resources\AbsensiSiswaResource\RelationManagers;
use App\Models\AbsensiSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use App\Models\Kegiatan;
use App\Models\Murid;
use App\Models\EventCourse;



class AbsensiSiswaResource extends Resource
{
    protected static ?string $model = AbsensiSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';
    protected static ?string $navigationGroup = "Elearning Management";
    protected static ?string $navigationLabel = 'Absensi Siswa';
    protected static ?string $modelLabel = 'Absensi Siswa';

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
        return $query->where('murid_id', $user->murid?->id);
    }

    if ($user->hasRole('pengajar')) {
        $pengajar = $user->pengajar;

        if (!$pengajar) {
            return $query->whereRaw('0 = 1'); // kembalikan kosong
        }

        $eventCourseIds = EventCourse::where('pengajar_id', $pengajar->id)->pluck('id');

        return $query->whereHas('kegiatan', function ($q) use ($eventCourseIds) {
            $q->whereIn('event_course_id', $eventCourseIds);
        });
    }

    return $query;
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kegiatan_id')
                ->required()
                ->label('Kegiatan')
                ->options(function () {
                    $user = Auth::user();
                    $pengajar = $user->pengajar;
                    
                    if (!$pengajar) { // kalau bukan pengajar, kosongkan                     
                    }
                    return Kegiatan::where('pengajar_id', $pengajar->id)
                    ->pluck('nama', 'id');
                }),
                Forms\Components\Select::make('murid_id')
                ->required()
                ->label('Murid')
                ->options(function () {
                    $user = Auth::user();
                    $pengajar = $user->pengajar;

                    if (!$pengajar) return [];

                    // Ambil semua event_course_id yang diajar oleh pengajar ini
                    $eventCourseIds = \App\Models\EventCourse::where('pengajar_id', $pengajar->id)->pluck('id');

                    // Ambil user_id (murid) dari tabel pivot yang beli course tersebut
                    $muridIds = \DB::table('event_course_user')
                    ->whereIn('event_course_id', $eventCourseIds)
                    ->pluck('user_id');

                    // Ambil nama muridnya (dari model Murid atau User)
                    return \App\Models\Murid::whereIn('user_id', $muridIds)->pluck('nama_lengkap', 'id');
                }),
                Forms\Components\Select::make('status')
                ->options([
                    'hadir' => 'Hadir',
                    'izin' => 'Izin',
                    'alpa' => 'Alpa',
                    ])
                ->required()
                ->default('hadir'),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kegiatan.nama')->label('Kegiatan'),
                Tables\Columns\TextColumn::make('murid.nama_lengkap')->label('Murid'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('keterangan')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAbsensiSiswas::route('/'),
            'create' => Pages\CreateAbsensiSiswa::route('/create'),
            'edit' => Pages\EditAbsensiSiswa::route('/{record}/edit'),
        ];
    }
}
