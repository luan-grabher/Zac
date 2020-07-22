<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TasksFilter extends Model
{
    protected $fillable = ['owner','user','enterprise','group','order','key_word', 'status'];
}
