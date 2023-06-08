<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Resources\ReplyResource;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    protected SupportRepository $repository;

    public function __construct(SupportRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request)
    {
        $supports = $this->repository->getSupports($request->all());
        return SupportResource::collection($supports);
    }


    public function mySupports(Request $request)
    {
        $supports = $this->repository->getMySupports($request->all());
        return SupportResource::collection($supports);
    }


    public function store(StoreSupportRequest $request)
    {

        $support = $this->repository->createNewSupport($request->validated());
        return new SupportResource($support);
    }



}
