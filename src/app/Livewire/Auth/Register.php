<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Title;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $no_wa, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'no_wa' => 'nullable|string|max:20',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'no_wa'    => $this->formatNomorWA($this->no_wa),
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole('murid');

        if ($user->no_wa) {
            try {
                Http::post(config('services.whatsapp.url'), [
                    'number'  => $user->no_wa,
                    'message' => "Halo $user->name 👋\n\nTerima kasih sudah mendaftar di *calonsukses.social*. Love You",
                ]);
            } catch (\Throwable $th) {
                logger()->error('Gagal kirim WA: ' . $th->getMessage());
            }
        }

        auth()->login($user);
        return redirect()->route('filament.edu.pages.dashboard');
    }

    private function formatNomorWA($nomor)
    {
        $nomor = preg_replace('/[^0-9]/', '', $nomor);
        if (str_starts_with($nomor, '0')) {
            $nomor = '62' . substr($nomor, 1);
        }
        return $nomor;
    }

    public function render()
    {
        return view('livewire.auth.register', [
            'titles' => Title::first() ?? (object)['title' => 'calonsukses.social'],
        ]);
    }
}
