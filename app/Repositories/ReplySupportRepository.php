<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;

class ReplySupportRepository
{
    use RepositoryTrait;
    protected Support $entity;

    public function __construct(ReplySupport $support)
    {
        $this->entity = $support;
    }


    public function createReplyToSupport(array $data)
    {
        $user = $this->getUserAuth();

        return $this->entity->create([
            'support_id' => $data['support'],
            'description'=>$data['description'],
            'user_id' => $user->id
        ]);

    }




}
