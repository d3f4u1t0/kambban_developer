<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    /**
     * this parameter returned the model name in database
     * @var string
     */

    protected $table = "requests_types";

    /**
     * The attributes that are mass assignable.
     * @var array
     */

    protected $fillable = [
        "id",
        "nombre",
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
}
