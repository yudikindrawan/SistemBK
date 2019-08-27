<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        App\roles::create([
            'nama_role' => 'Admin'
        ]);
        App\roles::create([
            'nama_role' => 'BK'
        ]);
        App\roles::create([
            'nama_role' => 'Kepsek'
        ]);
        App\roles::create([
            'nama_role' => 'OrangTua'
        ]);
        App\User::create([
            'roles_id' => 1,
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
        App\User::create([
            'roles_id' => 2,
            'username' => 'konseling',
            'password' => bcrypt('konseling'),
        ]);
        App\User::create([
            'roles_id' => 3,
            'username' => 'kepsek',
            'password' => bcrypt('kepsek'),
        ]);
        App\User::create([
            'roles_id' => 4,
            'username' => 'OrangTua',
            'password' => bcrypt('OrangTua'),
        ]);
        App\periode::create([
            'semester' => 'Ganjil',
            'tahun_akademik' => 2019,
        ]);
        App\periode::create([
            'semester' => 'Genap',
            'tahun_akademik' => 2019,
        ]);
        App\kelas::create([
            'nama_kelas' => 'AP1',
        ]);
        App\kelas::create([
            'nama_kelas' => 'AP2',
        ]);
    }
}
