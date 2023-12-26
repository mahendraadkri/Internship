<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "customers";
    protected $primaryKey = "customer_id";
    protected $guarded = [];

    protected $fillable = [
        'user_name',
        'email',
        'gender',
        'address',
        'state',
        'country',
        'dob',
        'password',
        
    ];
    
    public function setUserNameAttribute($value)
    {
    $this->attributes['user_name'] = ucwords($value);
    }

    public function getDobAttribute($value)
    {
        return $this->asDateTime($value)->format('d-M-Y');
    }

   
}
