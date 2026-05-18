<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::updateOrCreate(
            ['slug' => 'sistem-maintenance-dan-monitoring-kampus'],
            [
                'title' => 'Sistem Maintenance dan Monitoring Kampus',
                'short_description' => 'Sistem berbasis web untuk mengelola permintaan maintenance gedung kampus secara terpusat.',
                'description' => 'Aplikasi ini membantu proses pengajuan permintaan maintenance, verifikasi admin, penugasan teknisi, monitoring progres, hingga laporan hasil perbaikan.',
                'problem_analysis' => 'Proses permintaan maintenance masih manual, status perbaikan sulit dipantau, dan data laporan belum tersimpan secara rapi dalam satu sistem.',
                'system_requirements' => 'Manajemen user, pengajuan permintaan maintenance, verifikasi admin, penugasan teknisi, update progres, monitoring status, dan laporan maintenance.',
                'tech_stack' => 'Laravel, Filament, Livewire, Blade, MariaDB, Docker',
                'diagram_image' => null,
                'status' => 'development',
                'is_final_project' => true,
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'sistem-absensi'],
            [
                'title' => 'Sistem Absensi Karyawan',
                'short_description' => 'Sistem untuk mencatat dan memantau absensi karyawan secara digital.',
                'description' => 'Project ini dibuat untuk membantu pencatatan kehadiran karyawan agar lebih rapi, cepat, dan mudah dipantau oleh admin.',
                'problem_analysis' => 'Absensi manual rawan kesalahan pencatatan, sulit direkap, dan membutuhkan waktu lama untuk membuat laporan.',
                'system_requirements' => 'Manajemen karyawan, pencatatan absensi, status kehadiran, rekap data, dan laporan absensi.',
                'tech_stack' => 'Laravel, Filament, Livewire, Blade, MariaDB, Docker',
                'diagram_image' => null,
                'status' => 'progress',
                'is_final_project' => false,
            ]
        );
    }
}