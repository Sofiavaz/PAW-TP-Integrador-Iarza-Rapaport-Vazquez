<?php

namespace App;

use Doctrine\DBAL\Types\TextType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        return Course::query()->where('courses.date_time', '>', now())
            ->join('users', 'users.id', '=', 'courses.user_id')
            ->join('platforms', 'platforms.id', '=', 'courses.platform_id')
            ->leftJoin('enrollments', 'courses.id', '=', 'enrollments.course_id')
            ->select('courses.id', 'courses.name', 'courses.img_path', 'courses.date_time',
                'users.name as teacher_name', 'users.email as teacher_email',
                'platforms.name as platform_name',
                'courses.short_description', 'courses.long_description', 'courses.max_enrollments',
                'courses.price', 'courses.duration_mins', 'courses.platform_id',
                DB::raw('max_enrollments - count(enrollments.id) as free_spots'))
            ->groupBy('courses.id', 'courses.id', 'courses.name', 'courses.img_path', 'courses.date_time',
                'teacher_name', 'teacher_email',
                'platform_name',
                'courses.short_description', 'courses.long_description', 'courses.max_enrollments',
                'courses.price', 'courses.duration_mins', 'courses.platform_id')
            ->orderBy('courses.date_time')
            ->paginate($perPage);

    }

    public static function scopeTeaching($query)
    {
        return $query->where('user_id', '=', Auth::id());
    }

    public function freeSpots() : int
    {
        $enrollments = $this->query()
            ->where('courses.id', '=', $this->id)
            ->join('enrollments as e', 'e.course_id', '=', 'courses.id')
            ->count();

        return $this->max_enrollments - $enrollments;
    }

    public static function scopeTaking($query)
    {
        return $query->join('enrollments as e', 'e.course_id', '=', 'courses.id')
            ->join('users', 'users.id', '=','courses.user_id')
            ->join('platforms', 'platforms.id', '=', 'courses.platform_id')
            ->select('courses.id', 'courses.name', 'courses.img_path', 'courses.date_time',
                'users.name as teacher_name', 'users.email as teacher_email',
                'platforms.name as platform_name',
                'courses.short_description', 'courses.long_description', 'courses.max_enrollments',
                'courses.price', 'courses.duration_mins','courses.platform_id', 'courses.access_link')
            ->where('e.user_id', '=', Auth::id());
    }

    public static function scopeAfter($query, $date)
    {
        return $query->where('date_time', '>=', $date);
    }

    public static function recommended($perPage)
    {
        $query = Course::query()->where('courses.date_time', '>', now())
            ->join('users', 'users.id', '=','courses.user_id')
            ->join('platforms', 'platforms.id', '=', 'courses.platform_id')
            ->leftJoin('enrollments', 'courses.id', '=', 'enrollments.course_id')
            ->select('courses.id', 'courses.name', 'courses.img_path', 'courses.date_time',
                'users.name as teacher_name', 'users.email as teacher_email',
                'platforms.name as platform_name',
                'courses.short_description', 'courses.long_description', 'courses.max_enrollments',
                'courses.price', 'courses.duration_mins','courses.platform_id',
                DB::raw('max_enrollments - count(enrollments.id) as free_spots'))
            ->groupBy('courses.id', 'courses.id', 'courses.name', 'courses.img_path', 'courses.date_time',
                'teacher_name', 'teacher_email',
                'platform_name',
                'courses.short_description', 'courses.long_description', 'courses.max_enrollments',
                'courses.price', 'courses.duration_mins','courses.platform_id')
            ->orderBy('courses.date_time', 'desc');

        if (Auth::check()){
            return $query->where('courses.user_id', '<>', Auth::id())->paginate($perPage);
        }
        else {
            return $query->paginate($perPage);
        }
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }


    public function attends($user)
    {
        $enrollment = Enrollment::all()->where('course_id', '=', $this->id)
            ->where('user_id', '=', $user->id)
            ->all();

        return $enrollment != null;
    }

}
