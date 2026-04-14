<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class Destinationseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'nama' => 'Kebun binatang sang kulim',
            'description' => 'Kebun binatang sang kulim adalah kebun binatang yang terletak di kota sangkulirang, kabupaten kutai timur, provinsi kalimantan timur. Kebun binatang ini memiliki berbagai macam satwa yang dapat dilihat oleh pengunjung.',
            'location' => 'Sangkulirang, Kutai Timur, Kalimantan Timur',
            'working_days' => 'weekend',
            'working_hours' => '07.00 - 16.00',
            'ticket_price' => 50.000,
        ]);
        Destination::create([
            'nama' => 'Alam Mayang',
            'description' => 'Alam Mayang adalah destinasi wisata alam yang terletak di Bali, dikenal dengan pemandangan alam yang indah dan udara yang sejuk.',
            'location' => 'JL.K-5',
            'working_days' => 'weekend',
            'working_hours' => '7 AM-4PM',
            'ticket_price' => 20.000,
            
        ]);
        Destination::create([
            'nama' => 'Candi Borobudur',
            'description' => 'Sobat Pesona pastinya sudah tidak asing kan dengan Candi Borobudur? Terletak di Kabupaten Magelang, Jawa Tengah, candi yang sangat megah dan rupawan ini telah dikenal oleh wisatawan lokal maupun mancanegara sebagai kuil Buddha terbesar di dunia. Wajar saja, karena Candi Borobudur memiliki luas sekitar 2500 meter persegi, dengan panjang 121,66 meter, lebar 121,38 meter, dan tinggi 35,40 meter.',
            'location' => 'Kabupaten Magelang, Jawa Tengah',
            'working_days' => 'All days',
            'working_hours' => '7AM-10PM',
            'ticket_price' => 20.000,
        ]);
        Destination::create([
            'nama' => 'Taman Nasional Baluran',
            'description' => 'Taman Nasional Baluran adalah taman nasional yang terletak di Jawa Timur, Indonesia. Taman ini dikenal dengan keanekaragaman hayati yang tinggi dan pemandangan alam yang indah.',
            'location' => 'Jawa Timur',
            'working_days' => 'All days',
            'working_hours' => '7AM-10PM',
            'ticket_price' => 10.000,
        ]);
        Destination::create([
            'nama' => 'Labuan Bajo, Sepetak Surga yang Terletak di Indonesia Timur',
            'description' => 'Labuan Bajo dan Taman Nasional Komodo adalah satu entitas yang tidak dapat terpisahkan. Keduanya saling terhubung sehingga ketika Sobat Pesona berada di Labuan Bajo, perlu mengunjungi Taman Nasional Komodo. Untuk mencapai ke sana, Sobat Pesona bisa menggunakan kapal feri atau kapal cepat. Ada banyak pilihan keberangkatan mulai dari pagi hingga sore hari.',
            'location' => 'Kecamatan Komodo, Kabupaten Manggarai Barat, Provinsi Nusa Tenggara Timur',
            'working_days' => 'All days',
            'working_hours' => '7AM-4PM',
            'ticket_price' => 50.000,
        ]);

        for ($i = 1; $i <= 10; $i++) {
            Destination::create([
                'nama' => fake()->name(),
                'description' => fake()->paragraph(),
                'location' => fake()->address(),
                'working_days' => 'All days',
                'working_hours' => '7AM-10PM',
                'ticket_price' => rand(10, 100) * 1000,
            ]);
            
            }
            for ($j = 1; $j <= 20; $j++) {
                Destination::create([
                    'nama' => fake("id_ID")->name(),
                    'description' => fake("id_ID")->sentence(),
                    'location' => fake("id_ID")->address() . ", Pekanbaru, Riau",
                    'working_days' => 'Everyday',
                    'working_hours' => '8 AM - 5 PM',
                    'ticket_price' => rand(10000, 100000),
                ]);
        }
    }
    
}
