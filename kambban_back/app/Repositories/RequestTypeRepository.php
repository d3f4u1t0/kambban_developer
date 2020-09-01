<?php


namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class RequestTypeRepository
{
    public static function indexQuery($fields)
    {
        return DB::table('requests_types as r')
            ->select($fields);
    }

}
