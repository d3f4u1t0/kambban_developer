<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CategoryRepository{

    public static function indexQuery($fields){
            return DB::table('categories as c')
                ->select($fields);
    }

}
