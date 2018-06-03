<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteVariables extends Model
{
    //url and names prefix
    const user = 'user';
    const account = 'account';

    //middleware
    const auth = 'auth';
}
