<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

use App\Classes;
use App\TeachersCourses;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});
Broadcast::channel('class.{id}', function ($user, $id) {

    $class = Classes::where('id', $id)->first();
    $count = TeachersCourses::where('teacher_id', $user->teacher_id)->where('course_id', $class->course_id)->count();
    if ($count > 0) {
        return true;
    }
    return false;
});
