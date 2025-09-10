<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OrganiserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'organiser1@example.com'],
            [
                'name' => 'Organiser One',
                'password' => Hash::make('  '),
                'role' => 'organiser'
            ]
        );

        User::updateOrCreate(
            ['email' => 'organiser2@example.com'],
            [
                'name' => 'Organiser Two',
                'password' => Hash::make('password123'),
                'role' => 'organiser'
            ]
        );
    } 
}
