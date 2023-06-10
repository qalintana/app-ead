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
        return $this->entity->with('modules.lessons')->get();
    }

    public function getCourse(string $text)
    {
        return $this->entity->with('modules.lessons')->findOrFail($text);
    }
}
