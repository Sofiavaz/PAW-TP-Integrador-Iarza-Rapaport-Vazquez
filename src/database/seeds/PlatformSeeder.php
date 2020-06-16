<?php

use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $platform = new \App\Platform();
        $platform->name = "Zoom";
        $platform->save();

        $platform = new \App\Platform();
        $platform->name = "Skype";
        $platform->save();

        $platform = new \App\Platform();
        $platform->name = "Hangouts";
        $platform->save();

        $platform = new \App\Platform();
        $platform->name = "Jitsi Meet";
        $platform->save();

        $platform = new \App\Platform();
        $platform->name = "MS Teams";
        $platform->save();

        $platform = new \App\Platform();
        $platform->name = "Google Meet";
        $platform->save();
    }
}
