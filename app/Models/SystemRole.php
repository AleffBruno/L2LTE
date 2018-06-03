<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemRole extends Model
{
    /* const ADMIN = 1;
    const USER = 0; */
    const ROLES = array(
        'USER'=>'0',
        'ADMIN'=>'1'
    );
}
