<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class TodoRepository
 * @package App\Repositories
 * @version March 23, 2025, 11:11 pm JST
 */

class TodoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'title',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Todo::class;
    }

    //ソート機能の実装
    public function search($sort, $status)
    {
        $query = Todo::query()->where("user_id", Auth::id());
        if (isset($status)) {
            $query->where("status", $status);
        }
        switch ($sort) {
            case "titleAsc":
                $query->orderBy("title", "asc");
                break;
            case "titleDesc":
                $query->orderBy("title", "desc");
                break;
            case "statusAsc":
                $query->orderBy("status", "asc");
                break;
            case "statusDesc":
                $query->orderBy("status", "desc");
                break;
            default:
        }
        return $query->get();
    }
}
