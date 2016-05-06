<?php

use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = new \App\Options;
        $options->title = 'localshot';
        $options->siteUrl = 'http://localhost:8000';
        $options->save();
    }
}
