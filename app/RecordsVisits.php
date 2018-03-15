<?php

namespace App;


use Illuminate\Support\Facades\Redis;

trait RecordsVisits
{
    /**
     * @return $this
     */
    public function recordVisit()
    {
        Redis::incr($this->visitsCacheKey());
        return $this;
    }

    /**
     * @return mixed
     */
    public function visits()
    {
        return Redis::get($this->visitsCacheKey()) ?? 0;
    }

    public function resetVisits()
    {
        Redis::del($this->visitsCacheKey());
    }

    /**
     * @return string
     */
    public function visitsCacheKey()
    {
        return "threads.{$this->id}.visits";
    }
}