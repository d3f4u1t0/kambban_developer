<?php

namespace App\Http\Controllers;

use App\Helpers\PaginateHelper;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    /**
     * @OA\Get(
     *     path="/categorias",
     *     summary="Endpoint para recuperar todas las categorias",
     *     tags={"Categorias"},
     *     description="Obtiene los registros paginados segun especificaciones del Query String (Javascript debe enviar objetos)",
     *     security={{"passport": {}}},
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Cuantos registros por pagina se desean",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Desde que pagina extraer los registros",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="sorts",
     *         in="query",
     *         description="(Opcional) - Ordenar por columnas.",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="filters",
     *         in="query",
     *         description="(Opcional) - Filtrar por columnas.",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="activo",
     *         in="query",
     *         description="(Opcional) - Envie 1 si desea filtrar solo las capacidades activas",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     )
     * )
     * @param Request $request
     * @return Response
     **/
    public function index(Request $request)
    {
        $fields = [
            'c.id',
            'c.nombre',
            'c.created_at',
            'c.updated_at'
        ];
        return response(PaginateHelper::returnDataPaginate(CategoryRepository::indexQuery($fields), $request, $fields), Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/categorias/{id}",
     *     summary="Endpoint para recuperar la categorias según su id",
     *     tags={"Categorias"},
     *     description="",
     *     security={{"passport": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Id del registro que desea consultar",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Registro no encontrado."
     *     )
     * )
     * @param int $id
     * @return Response
     **/
    public function find(int $id)
    {
        $data = Category::find($id);
        if (!$data) {
            return response(['message' => 'No se encontro el registro.'], Response::HTTP_NOT_FOUND);
        }
        return response($data, Response::HTTP_OK);
    }


    /**
     * @OA\Delete(
     *     path="/categorias/{id}",
     *     summary="Endpoint para eliminar una capacidad según su id",
     *     tags={"Categorias"},
     *     description="Elimina registros de capacidad",
     *     security={{"passport": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="Body",
     *                     type="string"
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="No se pudo eliminar el registro."
     *     )
     * )
     * @param int $id
     * @return Response
     **/
    public function destroy($id)
    {
        $modelo = Category::find($id);
        if (!$modelo) {
            return response(['message' => 'No se encontro el registro.'], Response::HTTP_NOT_FOUND);
        }
        $modelo->delete();
        return response([$modelo], Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/categorias",
     *     summary="Endpoint para crear las categorias",
     *     tags={"Categorias"},
     *     description="Crea el registro de una capacidad, verificar Json",
     *     security={{"passport": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="Body",
     *                     type="string"
     *                 ),
     *                 example={"nombre":"Categoria"},
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="El request no obtuvo los campos requeridos para crear."
     *     )
     * )
     * @param CategoryRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $modelo = new Category();
        $modelo->fill($request->validated());
        $modelo->save();
        return response([$modelo], Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *     path="/categorias/{id}",
     *     summary="Endpoint para actualizar las categorias según su id",
     *     tags={"Categorias"},
     *     description="Actualiza una categorias segun su id",
     *     security={{"passport": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="Body",
     *                     type="string"
     *                 ),
     *                 example={"nombre":"Otra categoria"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="No se obtuvierón todos los campos que valida el request."
     *     )
     * )
     * @param $id
     * @param CategoryRequest $request
     * @return Response
     */
    public function update($id, CategoryRequest $request)
    {
        $modelo = Category::find($id);;
        if (!$modelo) {
            return response(['message' => 'No se encontró el registro.'], Response::HTTP_NOT_FOUND);
        }
        $modelo->fill($request->validated());
        $modelo->save();
        return response([$modelo], Response::HTTP_OK);
    }

}
