<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /* ——— A. Pastikan role super_admin ada ——— */
        Role::firstOrCreate(['name' => 'super_admin']);

        /* ——— B. Buat / ambil user admin ——— */
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name'     => 'Admin',
                'password' => bcrypt('password'),   // ganti kalau mau
            ]
        );

        /* ——— C. Assign role super_admin bila belum ——— */
        if (! $admin->hasRole('super_admin')) {
            $admin->assignRole('super_admin');
        }

        /* ——— D. Jalankan RoleSeeder & seeder lain ——— */
    $this->call([
        RoleSeeder::class,
        PermissionSeeder::class,
        TeamSeeder::class,
        MediaSeeder::class,
        HomecSeeder::class,
        HomeaSeeder::class,
        HomebSeeder::class,
        TitleSeeder::class,
        AbtpointSeeder::class,
        CourseSeeder::class,
        TestiSeeder::class,
        // CompanySeeder::class,
        // BranchCompanySeeder::class,
        // DepartemenSeeder::class,
        // EmployeeSeeder::class,
        // PengajarSeeder::class,
        // KaryawanSeeder::class,
        // PenggajianSeeder::class,
        // EventCourseSeeder::class,
        // MuridSeeder::class,
        // PaymentSeeder::class,
        // KegiatanSeeder::class,
        // ModulSeeder::class,
        // TaskSeeder::class,
        // JawabanTaskSeeder::class,
        // AbsensiSiswaSeeder::class,
        // SertifikatSeeder::class,
        // AbsensiPengajarSeeder::class,
        // GajiPengajarSeeder::class,
        // PenggajianPengajarSeeder::class,



    ]);
}

}