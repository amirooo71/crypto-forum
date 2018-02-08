<?php
/**
 * Created by PhpStorm.
 * User: boorak
 * Date: 2/2/18
 * Time: 10:16 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

trait Favorable
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    /**
     * @return Model
     */
    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (!$this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    public function unfavorite()
    {
        $attributes = ['user_id' => auth()->id()];
        $this->favorites()->where($attributes)->delete();
    }

    /**
     * @return bool
     */
    public function isFavorited()
    {
        return $this->favorites()->where(['user_id' => auth()->id()])->exists();
    }

    /**
     * @return bool
     */
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    /**
     * Custom getter
     * @return mixed
     */
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}