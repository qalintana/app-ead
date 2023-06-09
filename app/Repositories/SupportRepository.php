<?php

namespace App\Repositories;

use App\Models\Support;
use App\Repositories\Traits\RepositoryTrait;

class SupportRepository
{
    use RepositoryTrait;

    protected Support $entity;

    public function __construct(Support $support)
    {
        $this->entity = $support;
    }

    public function getMySupports(array $filters = [])
    {
        $filters['user'] = true;
        return $this->getMySupports($filters);
    }

    public function getSupports(array $filters = [])
    {
        return $this->entity->where(function ($query) use ($filters) {
            if(isset($filters['lesson'])) {
                $query->where('lesson_id', $filters['lesson']);
            }

            if(isset($filters['status'])) {
                $query->where('status', $filters['status']);
            }

            if(isset($filters['user'])) {
                $user = $this->getUserAuth();
                $query->where('user_id', $user->id);
            }

            if(isset($filters['description'])) {
                $filter = $filters['filter'];
                $query->where('description', 'LIKE', "%{$filter}%");
            }
        })->with('replies')
        ->orderBy('updated_at')
        ->get();
    }


    public function createNewSupport(array $data): Support
    {
        $support = $this->getUserAuth()->supports()
                            ->create(
                                ['lesson_id'=> $data['lesson'],
                                     'description'=>$data['description'],
                                     'status'=>$data['status'],
                                ]
                            );

        return $support;
    }

    public function createReplyToSupportId($supportId, array $data)
    {
        $user = $this->getUserAuth();

        return $this->getSupport($supportId)->replies()->create([
            'description'=>$data['description'],
            'user_id' => $user->id
        ]);

    }

    public function getSupport(string $support)
    {
        return $this->entity->findOrFail($support);
    }


}
