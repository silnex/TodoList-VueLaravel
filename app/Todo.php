<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Todo extends Model
{
    protected $fillable = ['check', 'title', 'description', 'user_id'];

    protected $casts = [
        'check' => 'boolean'
    ];

    /**
     * Eloquent relations belong to User
     *
     * @return App\User
     */
    function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get pagination group by date
     *
     * @param App\User $user
     * @param integer $perPage
     * @param integer $page
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    static public function getIndexPaginator(User $user, int $perPage, ?int $page)
    {
        $items = $user
            ->todos()
            ->select([
                \DB::Raw('DATE(created_at) as day'),
                \DB::Raw('COUNT(created_at) as todo_count'),
            ])
            ->groupBy('day')
            ->orderBy('id', 'desc')
            ->get();


        $todoPaginator = new LengthAwarePaginator(
            $items
                ->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return $todoPaginator;
    }

    /**
     * Check writter id and user id
     *
     * @param integer
     * @return boolean
     */
    public function authorCheck(?int $id): bool
    {
        if ($this->user->id === $id) {
            return true;
        } else {
            return false;
        }
    }
}
