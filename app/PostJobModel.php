<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostJobModel extends Model
{
    protected $table="post_job_models";
    protected $filltable = ["CompanyName","Term","Title","Requirement","Experience","Email","Address","Lastdate","Phone","Icon"];
}
