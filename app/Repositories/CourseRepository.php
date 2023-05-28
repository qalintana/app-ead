<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected Course $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return Course::get();
    }

    public function getCourse(string $text)
    {
        return Course::findOrFail($text);
    }
}
