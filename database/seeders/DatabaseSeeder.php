<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\contact_details;
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
        \App\Models\User::factory(1)->create();

        \App\Models\contact_details::factory()->create([
            'address'=>'23 , Dokki st . Giza',
            'phone_number'=>'01100486283',
            'email'=>'aklniretsurant@gmail.com',
            'about' => 'AKLA is the definition of delicious! Founded in 2022, we like to say we are bringing joy to San Francisco, and it’s something we hope to be doing for years to come. But we offer more than just high-quality, delicious meals. We are a full-service Food retuarant that has become an important part of the local community. Come down and meet us.'
        ]);
        $this->call(Admin::class);
    }
}
