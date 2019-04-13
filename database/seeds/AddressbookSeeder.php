<?php

use Illuminate\Database\Seeder;

class AddressbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Addressbook::class, 100)->create();
    }
}
