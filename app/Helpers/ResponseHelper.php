<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;

class ResponseHelper
{
    /**
     * Send a success response.
     *
     * @param string $message
     * @param mixed $data
     * @return JsonResponse
     */
    public static function success(string $message,$code=200, $data = null ): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ]);
    }

    /**
     * Send an error response.
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public static function error(string $message, int $code = 400): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => $code,
        ], $code);
    }

    /**
     * Add or Edit a record in the database.
     *
     * @param Model $model
     * @param array $data
     * @param int|null $id
     * @return Model
     */
    public static function addOrEdit(Model $model, array $data, $id = null)
    {
        if ($id) {
            // Find the record by ID and update
            $record = $model->find($id);
            if ($record) {
                $record->update($data);
                return $record;
            }
        }

        // Create a new record if ID is not provided or record not found
        return $model->create($data);
    }
}
