<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectProgress;
use Illuminate\Database\Seeder;

class ProjectProgressSeeder extends Seeder
{
    public function run(): void
    {
        $maintenanceProject = Project::where('slug', 'sistem-maintenance-dan-monitoring-kampus')->first();

        if ($maintenanceProject) {
            ProjectProgress::updateOrCreate(
                [
                    'project_id' => $maintenanceProject->id,
                    'title' => 'Perancangan Database dan Alur Sistem',
                ],
                [
                    'description' => 'Tahap awal meliputi analisis kebutuhan sistem, rancangan database, alur permintaan maintenance, dan pembagian role user.',
                    'progress_percentage' => 65,
                    'status' => 'progress',
                    'progress_date' => now(),
                ]
            );

            ProjectProgress::updateOrCreate(
                [
                    'project_id' => $maintenanceProject->id,
                    'title' => 'Implementasi CRUD Filament',
                ],
                [
                    'description' => 'CRUD data utama mulai dibuat menggunakan Filament v3, termasuk data project, progress project, dan contact message.',
                    'progress_percentage' => 80,
                    'status' => 'development',
                    'progress_date' => now()->addDay(),
                ]
            );
        }

        $absensiProject = Project::where('slug', 'sistem-absensi')->first();

        if ($absensiProject) {
            ProjectProgress::updateOrCreate(
                [
                    'project_id' => $absensiProject->id,
                    'title' => 'Pembuatan Modul Absensi',
                ],
                [
                    'description' => 'Modul absensi dibuat untuk mencatat kehadiran karyawan dan menampilkan status absensi.',
                    'progress_percentage' => 45,
                    'status' => 'progress',
                    'progress_date' => now(),
                ]
            );
        }
    }
}