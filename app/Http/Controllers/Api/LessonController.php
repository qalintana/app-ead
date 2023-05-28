<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LesonResource;
use App\Repositories\LessonRepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected LessonRepository $repository;


    public function __construct(LessonRepository $lessonRepository)
    {
        $this->repository = $lessonRepository;
    }

    public function index($id)
    {
        return LesonResource::collection($this->repository->getLessonByModuleId($id));
    }


    public function show($id)
    {
        return new LesonResource($this->repository->getLesson($id));
    }


}
