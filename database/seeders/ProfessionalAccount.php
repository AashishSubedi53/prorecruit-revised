<?php

namespace Database\Seeders;

use App\Models\Professional;
use App\Models\ProfessionalAddress;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfessionalAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'Professional',
            'email' => 'professional@gmail.com',
            'password' => Hash::make('password'),
            'user_type' => 'professional'
        ]);

        $professional = Professional::create([
            'first_name' => 'Ram',
            'last_name' => 'Bahadur',
            
            'payment_methods' => 'esewa',
            'PAN' => '347834834',
            'user_id' => $user->id,
            'phonenumber' => '9876543210',
            'profile_image' => '',
        ]);

        ProfessionalAddress::create([
            'professional_id' => $professional->id,
            'address_line_1' => 'pokhara-01',
            'address_line_2' => 'lekhnath',
            'province' => 'Gandaki',
            'city' => 'Pokhara',
            'postal_code' => '33700',
        ]);
       
    }
}
