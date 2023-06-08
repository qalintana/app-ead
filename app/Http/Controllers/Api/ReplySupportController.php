<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Http\Resources\ReplyResource;
use App\Repositories\ReplySupportRepository;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public ReplySupportRepository $repository;

    public function __construct(ReplySupportRepository  $repository)
    {
        $this->repository = $repository;
    }


    public function createReply(StoreReplySupportRequest $request)
    {
        $reply = $this->repository->createReplyToSupport($request->validated());
        return new  ReplyResource($reply);
    }
}
