<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        ContactMessage::updateOrCreate(
            [
                'email' => 'daboh@example.com',
                'subject' => 'Review Project UTS',
            ],
            [
                'name' => 'Dudung',
                'message' => 'Project portfolio sudah cukup baik.',
            ]
        );

        ContactMessage::updateOrCreate(
            [
                'email' => 'client@example.com',
                'subject' => 'Diskusi Project Website',
            ],
            [
                'name' => 'Client Demo',
                'message' => 'Halo, saya tertarik untuk berdiskusi mengenai pembuatan website berbasis Laravel dan Filament.',
            ]
        );

        ContactMessage::updateOrCreate(
            [
                'email' => 'bagus@example.com',
                'subject' => 'Testing Form Contact',
            ],
            [
                'name' => 'Bagus Testing',
                'message' => 'kelas king. ',
            ]
        );
    }
}