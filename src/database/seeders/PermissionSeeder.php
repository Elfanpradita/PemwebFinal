<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $muridPermissions = [

            'view_event::course',
            'view_any_event::course',
            // 'create_event::course',
            // 'update_event::course',
            // 'delete_event::course',

            'view_any_kegiatan',
            'view_kegiatan',

            'view_any_modul',
            'view_modul',

            'view_any_task',
            'view_task',

            'view_any_jawaban::task',
            'view_jawaban::task',
            'create_jawaban::task',
            'update_jawaban::task',
            'delete_jawaban::task',

            'view_any_absensi::siswa',
            'view_absensi::siswa',

            'view_any_sertifikat',
            'view_sertifikat',
        ];

        $pengajarPermissions = [

            'view_event::course',
            'view_any_event::course',

            'view_any_kegiatan',
            'view_kegiatan',
            'create_kegiatan',
            'update_kegiatan',
            'delete_kegiatan',

            'view_any_modul',
            'view_modul',
            'create_modul',
            'update_modul',
            'delete_modul',

            'view_any_task',
            'view_task',
            'create_task',
            'update_task',
            'delete_task',

            'view_any_jawaban::task',
            'view_jawaban::task',

            'view_any_absensi::siswa',
            'view_absensi::siswa',
            'create_absensi::siswa',
            'update_absensi::siswa',
            'delete_absensi::siswa',
        ];

        $allPermissions = array_unique(array_merge($muridPermissions, $pengajarPermissions));

        foreach ($allPermissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        $murid = Role::firstOrCreate(['name' => 'murid', 'guard_name' => 'web']);
        $pengajar = Role::firstOrCreate(['name' => 'pengajar', 'guard_name' => 'web']);

        $murid->syncPermissions(Permission::whereIn('name', $muridPermissions)->get());
        $pengajar->syncPermissions(Permission::whereIn('name', $pengajarPermissions)->get());
    }
}
