<?php

namespace App\Repositories;

use App\Models\Request;
use Illuminate\Support\Facades\DB;

class RequestRepository{

    public static function indexQuery($fields){
        return DB::table('requests as r')
            ->join('categories as c','r.category_id','=','c.id')
            ->join('requests_types as rt','r.requesttype_id','=','rt.id')
            ->select($fields);
    }

    public static function eagerFind($id){
        return Request::with("user")
            ->with("requestType")
            ->with("categoria")
            ->find($id);
    }
}
