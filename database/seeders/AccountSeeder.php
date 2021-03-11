<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'siswa',
                'name' => 'ini adalah Siswa',                
                'role' => 'Siswa',
                'password' => bcrypt('siswa123'),
            ],
            [
                'username' => 'koordinator',
                'name' => 'ini adalah koordinator',                
                'role' => 'Koordinator Senbud & UPD',
                'password' => bcrypt('koordinator123'),
            ],
            [
                'username' => 'instrukturupd',
                'name' => 'ini adalah Instruktur UPD',                
                'role' => 'Instruktur UPD',
                'password' => bcrypt('instrukturupd123'),
            ],
            [
                'username' => 'instrukturupdprod',
                'name' => 'ini adalah instrukturupdprod',                
                'role' => 'Instruktur UPD Prod',
                'password' => bcrypt('instrukturupdprod123'),
            ],
            [
                'username' => 'gurusenbud',
                'name' => 'ini adalah gurusenbud',                
                'role' => 'Guru Senbud',
                'password' => bcrypt('gurusenbud123'),
            ],
            [
                'username' => 'pembimbingrayon',
                'name' => 'ini adalah pembimbingrayon',                
                'role' => 'Pembimbing Rayon',
                'password' => bcrypt('pembimbingrayon123'),
            ],        
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
