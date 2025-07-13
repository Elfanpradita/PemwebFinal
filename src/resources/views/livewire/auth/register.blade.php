<main>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="bg-white shadow rounded p-5">
                        <h2 class="text-center mb-4">Daftar Akun</h2>

                        <form wire:submit.prevent="register">
                            {{-- Nama --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" wire:model.defer="name" class="form-control" placeholder="Nama Lengkap">
                                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" wire:model.defer="email" class="form-control" placeholder="Email aktif">
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- Nomor WhatsApp --}}
                            <div class="mb-3">
                                <label class="form-label">Nomor WhatsApp</label>
                                <input type="text" wire:model.defer="no_wa" class="form-control" placeholder="08xxxxxxxxxx">
                                @error('no_wa') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" wire:model.defer="password" class="form-control" placeholder="Minimal 6 karakter">
                                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            {{-- Konfirmasi Password --}}
                            <div class="mb-4">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" wire:model.defer="password_confirmation" class="form-control" placeholder="Ulangi password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2">Daftar</button>
                        </form>

                        <div class="text-center mt-3">
                            <small>Sudah punya akun?
                                <a href="{{ route('filament.edu.auth.login') }}" class="text-primary text-decoration-none">Login di sini</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</main>
