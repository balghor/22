<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    public function __construct()
    {
        $this->setTable("album");
        return $this;
    }
}
