<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaporanSeeder extends Seeder
{
 
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kecamatan = [
            'Kec. Dayeuhkolot',
            'Kec. Baleendah',
            'Kec. Bojongsoang',
            'Kec. Rancaekek',
            'Kec. Majalaya',
            'Kec. Solokanjeruk',
            'Kec. Cileunyi',
            'Kec. Margaasih',
        ];

        for ($i = 0; $i < 15; $i++) {
            DB::table('laporan')->insert([
                'nama_pelapor'    => $faker->name(),
                'lokasi'          => $faker->randomElement($kecamatan) . ', ' . $faker->streetName(),
                'tinggi_genangan' => $faker->numberBetween(10, 150),
                'keterangan'      => $faker->randomElement([
                    'Jalan tergenang, kendaraan tidak bisa melintas.',
                    'Warga mulai mengungsi ke tempat yang lebih aman.',
                    'Genangan masuk ke dalam rumah warga.',
                    'Sawah dan kebun warga ikut terendam.',
                    'Akses jembatan terputus akibat banjir.',

                ]),
                'tanggal_kejadian' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
