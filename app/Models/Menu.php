<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id','company_id','branch_id','role_id','menu_name','menu_url','menu_icon','group_id','parent_id','order_by','status','deleted_at'];
}
