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

    public static function upcoming($perPage)
    {
//        if (Auth::check()) {
//
//            return Course::query()
//                ->join('enrollments as e', 'e.course_id', 'courses.id')
//                ->where('e.user_id', '<>', Auth::id())
////                ->where('courses.user_id', '<>', Auth::id())
//                ->where('courses.date_time', '>', now())->paginate($perPage);
//        }
//        else
//        {
            return Course::query()->where('courses.date_time', '>', now())
                ->select('courses.name', 'courses.img_path', 'courses.date_time', 'courses.short_description',
                'courses.long_description', 'courses.max_enrollments', 'courses.price', 'courses.duration_mins',
                'courses.platform_id')
                ->paginate($perPage);
//        }
    }

    public static function scopeTeaching($query)
    {
        return $query->where('user_id', '=', Auth::id());
    }

    public static function scopeTaking($query)
    {
        return $query->join('enrollments as e', 'e.course_id', '=', 'courses.id')
            ->where('e.user_id', '=', Auth::id());
    }

    public static function recommended($perPage)
    {
//        if (Auth::check()) {
//            return Course::query()->join('enrollments as e', 'e.course_id', 'courses.id')
//                ->where('e.user_id', '<>', Auth::id())
//                ->where('courses.user_id', '<>', Auth::id())
//                ->join('users', 'courses.user_id', '=', 'users.id')
//                ->select('courses.name', 'courses.date_time', 'courses.short_description',
//                            'courses.long_description', 'courses.max_enrollments', 'courses.price',
//                            'courses.duration_mins', )
//                ->paginate($perPage);
//        }
//        else {
            return Course::query()->select('courses.name', 'courses.img_path', 'courses.date_time',
                'courses.short_description','courses.long_description', 'courses.max_enrollments',
                'courses.price', 'courses.duration_mins', 'courses.platform_id')
            ->paginate($perPage);
//        }
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }


    public function attends($user){
        $enrollment = Enrollment::all()->where('course_id', '=', $this->id)
            ->where('user_id', '=', $user->id)
            ->all();

        return $enrollment != null;
    }

}
