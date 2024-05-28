<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvManage extends Model
{
    use HasFactory;

    protected $table = 'adv_manages';

    protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];
}
