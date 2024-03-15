<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'street' => 'coba',
            'city' => 'coba',
            'province' => 'coba',
            'country' => 'coba',
            'postal_code' => 'coba',
        ]);
    }
}
