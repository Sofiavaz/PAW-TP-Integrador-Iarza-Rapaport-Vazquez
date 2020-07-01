<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $course = new \App\Course();
        $course->name = "Clase de inglés con Joey";
        $course->teacher()->associate(\App\User::all()->first());
        $date = now();
        date_add($date, date_interval_create_from_date_string("10 days"));
        $course->date_time = $date;
        $course->short_description = "Do play they miss give so up. Words to up style of since world. We leaf to snug on no need. Way own uncommonly travelling now acceptance bed compliment solicitude. ";
        $course->long_description = "Be at miss or each good play home they. It leave taste mr in it fancy. She son lose does fond bred gave lady get. Sir her company conduct expense bed any. Sister depend change off piqued one. Contented continued any happiness instantly objection yet her allowance. Use correct day new brought tedious. By come this been in. Kept easy or sons my it done. ";
        $course->max_enrollments = 20;
        $course->price = 200;
        $course->img_path = 'src/public/uploads/php5F5A.tmp.jpg';
        $course->duration_mins = 60;
        $course->platform()->associate(\App\Platform::all()->first());
        $course->save();
    }
}
