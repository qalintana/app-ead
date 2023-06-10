<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Repositories\Traits\RepositoryTrait;

class LessonRepository
{
    use RepositoryTrait;
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

    public function markLessonViewed(string $lesson)
    {
        $user = $this->getUserAuth();
        $view = $user->views()->where('lesson_id', $lesson)->first();

        if($view) {
            return $view->update([
                'qty' => $view->qty + 1
            ]);
        }
        return $user->views()->create([
            'lesson_id' => $lesson,
        ]);
    }
}
