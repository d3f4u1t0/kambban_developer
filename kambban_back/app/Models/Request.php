<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * this parameter returned the model name in database
     * @var string
     */

    protected $table = "requests";

    /**
     * The attributes that are mass assignable.
     * @var array
     */

    protected $fillable = [
        "id",
        "description",
        "respuesta",
        "user_id",
        "requesttype_id",
        "category_id",
        "created_at",
        "updated_at",
    ];
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id', "id");
    }

    public function requestType(){
        return $this->belongsTo(RequestType::class,'requesttype_id', "id");
    }

    public function categoria(){
        return $this->belongsTo(Category::class,'category_id', "id");
    }
}
