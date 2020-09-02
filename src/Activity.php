<?php

namespace Lakasir\UserLoggingActivity;

use Illuminate\Http\Request;
use Lakasir\UserLoggingActivity\Abstracts\ActivityAbstract;

class Activity extends ActivityAbstract
{
    public function __construct()
    {
        $this->request = request();
    }

    public function modelable(object $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    public function auth()
    {
        $this->auth = true;

        return $this;
    }

    public function info(string $info)
    {
        $this->info = $info;

        return $this->create();
    }

    public function creating()
    {
        $this->info = self::CREATING;

        $this->property = json_encode(['created' => $this->parent->toArray()]);

        return $this->create();
    }

    public function updating()
    {
        $this->info = self::UPDATING;

        $this->property = json_encode(['created' => $this->parent->toArray()]);

        return $this->create();
    }

    public function deleting()
    {
        $this->info = self::DELETING;

        $this->property = json_encode(['deleted' => $this->parent->toArray()]);

        return $this->create();
    }

    public function sync()
    {
        $this->queue = false;

        return $this;
    }
}
