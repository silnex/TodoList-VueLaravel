<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Check writter id and user id
     *
     * @param integer
     * @return boolean
     */
    public function authorCheck(?int $id): bool
    {
        if($this->user->id === $id) {
            return true;
        } else {
            return false;
        }
    }
}
