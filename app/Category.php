<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function __construct()
    {
        $this->setTable("category");
        return $this;
    }
}
