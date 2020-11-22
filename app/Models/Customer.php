<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
     protected $fillable =['name','address','phone','nid_no','shop_name','bank_name','city','photo','email','bank_branch','account_holder','account_no'];
}
