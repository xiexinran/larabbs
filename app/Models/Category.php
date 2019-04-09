<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//设置可见的属性
    protected $fillable =['name','description'];
}
