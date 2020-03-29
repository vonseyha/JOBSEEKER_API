<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCvModel extends Model
{
    protected $table ="post_cv_models";
    protected $filltable = ["Fullname","Email","Address","Interest","Experience","Language","Lastdate","Demo_File","Icon"];
}
