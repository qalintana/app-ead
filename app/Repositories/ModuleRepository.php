<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    protected Module $entity;

    public function __construct(Module $module)
    {
        $this->entity = $module;
    }

    public function getModuleByCourseId($courseId)
    {
        return $this->entity->where('course_id', $courseId)->get();
    }

    public function getAllModules()
    {
        return $this->entity->get();
    }

    public function getModule(string $text)
    {
        return $this->entity->findOrFail($text);
    }
}
