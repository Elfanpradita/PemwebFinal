<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KegiatanResource\Pages;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Facades\Filament;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = "Elearning Management";
    protected static ?string $navigationLabel = 'Kegiatan';
    protected static ?string $modelLabel = 'Kegiatan';

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
                // Filter kegiatan berdasarkan user login via relasi user di pengajar
                $query->whereHas('eventCourse.pengajar.user', function ($q) use ($user) {
                    $q->where('id', $user->id);
                });
            } elseif ($user->hasRole('murid')) {
                // Filter kegiatan berdasarkan event_course yang dibeli oleh murid (pivot event_course_user)
                $query->whereHas('eventCourse.users', function ($q) use ($user) {
                    $q->where('users.id', $user->id);
                });
            }
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('pengajar_id')
                ->default(fn() => \App\Models\Pengajar::where('user_id', auth()->id())->value('id'))
                ->required(),

            Forms\Components\Select::make('event_course_id')
                ->required()
                ->label('Event Course')
                ->options(function () {
                    $user = auth()->user();

                    // Kalau dia pengajar, filter hanya yang dia ajar
                    if ($user->hasRole('pengajar')) {
                        return \App\Models\EventCourse::where('pengajar_id', $user->pengajar?->id)
                            ->pluck('name', 'id');
                    }

                    // Selain pengajar (admin, dsb) bisa lihat semua
                    return \App\Models\EventCourse::pluck('name', 'id');
                }),


            Forms\Components\TextInput::make('nama')
                ->required()
                ->maxLength(255),
            Forms\Components\DatePicker::make('tanggal')
                ->required(),
            Forms\Components\TimePicker::make('start')
                ->required(),
            Forms\Components\TimePicker::make('end')
                ->required(),
            ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pengajar.user.name')
                    ->label('Pengajar'),
                Tables\Columns\TextColumn::make('eventCourse.name')
                    ->label('Event Course'),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('tanggal')->date()->sortable(),
                Tables\Columns\TextColumn::make('start')
                    ->label('Start Time')
                    ->time('H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->label('End Time')
                    ->time('H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}