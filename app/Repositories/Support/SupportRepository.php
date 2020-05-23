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

    public function getSearchSupports(array $ids): Collection
    {
        return Support::whereIn('id' , $ids)->get();
    }

    public function save(Support $support): Support
    {
        $support->save();

        return $support;
    }

    public function deleteById(int $id): void
    {
       Support::destroy($id);
    }
}
