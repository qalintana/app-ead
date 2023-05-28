<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    protected Lesson $entity;


    public function __construct(Lesson $lesson)
    {
        $this->entity = $lesson;
    }


    public function getLessonByModuleId($moduleId)
    {
        return $this->entity->where('module_id', $moduleId)->get();
    }


    public function getLesson(string $lesson)
    {
        return $this->entity->findOrFail($lesson);
    }
}
