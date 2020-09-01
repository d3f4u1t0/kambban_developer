<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class PaginateHelper
{
    public static function returnDataPaginate($query, Request $request, $arrayFields = [])
    {

        $sorts = json_decode($request->get('sorts', null), true);
        $filters = json_decode($request->get('filters', null), true);
        $perPage = $request->get("perPage", null);
        $arrWhere = [];
        $fields = [];

        // ordena segun el nombre de la columna
        if ($sorts) {
            foreach ($sorts as $key => $order) {
                $query->orderBy($key, ($order == ('desc' || 'asc') ? $order : 'asc'));
            }
        }
        // filtra segun la columna enviada y valida si existe
        if ($filters) {
            // permite obtener las columnas que se van a filtrar
            foreach ($arrayFields as $valor) {
                $array = explode(' as ', $valor);
                $var = explode('.', $array[0]);
                $fields[$array[1] ?? $var[1] ?? $var[0]] = $array[0];
            }

            foreach ($filters as $key => $value) {
                if ($fields[$key] ?? 0) {
                    $arrWhere[] = [$fields[$key], 'like', '%' . $value . '%'];
                }
            }

            if ($arrWhere) {
                $query->where($arrWhere);
            }
        }

        if ($perPage) {
            $query = $query->paginate($perPage)->withPath('');
            return [
                "total" => $query->total(),
                "data" => $query->items()
            ];
        } else {
            return [
                "data" => $query->get()
            ];
        }

    }
}
