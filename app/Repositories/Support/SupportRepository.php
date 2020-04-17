<?php


namespace App\Repositories\Support;


use App\Entities\Support;
use Illuminate\Database\Eloquent\Collection;

class SupportRepository implements SupportRepositoryInterface
{
    public function findAll(): Collection
    {
        return Support::all();
    }

    public function findAllCurrentUserSupports(int $id): Collection
    {
       return Support::where('user_id' , $id)->get();
    }

    public function getSupportById(int $id): ?Support
    {
        return Support::find($id);
    }

    public function save(Support $support): Support
    {
        $support->save();

        return $support;
    }
}
