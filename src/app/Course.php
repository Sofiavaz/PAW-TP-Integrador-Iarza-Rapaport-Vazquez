<?php

namespace App;

use Doctrine\DBAL\Types\TextType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


/**
 * Class CourseCard
 * @package App
 * @property int id
 * @property string name
 * @property int user_id
 * @property \DateTime date_time
 * @property string short_description
 * @property TextType long_description
 * @property int max_enrollments
 * @property float price
 * @property string platform_name
 * @property string access_link
 */
class Course extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'date_time', 'short_description', 'long_description', 'max_enrollments', 'price',
        'duration_mins', 'platform_name', 'access_link'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function upcoming()
    {
        if (Auth::check()) {

            return Course::query()
                ->join('enrollments as e', 'e.course_id', 'courses.id')
                ->where('e.user_id', '<>', Auth::id())
                ->where('courses.user_id', '<>', Auth::id())
                ->where('courses.date_time', '>', now())->limit(10)->get();
        }
        else
        {
            return Course::query()->where('courses.date_time', '>', now())->limit(10)->get();
        }
    }

    public static function asStudent()
    {
        return Course::query()->join('enrollments as e', 'e.course_id', '=', 'courses.id')
            ->where('e.user_id', '=', Auth::id())->get();
    }

    public static function asTeacher()
    {
        return Course::all()->where('user_id', '=', Auth::id());
    }

    public static function recommended()
    {
        if (Auth::check()) {

            // TODO Setear cookies de ultimos cursos vistos y acceder a los que esten relacionados
            return Course::query()->join('enrollments as e', 'e.course_id', 'courses.id')
                ->where('e.user_id', '<>', Auth::id())
                ->where('courses.user_id', '<>', Auth::id())->get();
        }
        else {
            return Course::all();
        }
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }


}
