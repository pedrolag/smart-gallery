<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Gets all registered categories
     */
    public function getAll()
    {
        return Category::all();
    }

    /**
     * Gets an specific category by its id
     */
    public function getById(int $id)
    {
        $resource = Category::find($id);

        if (is_null($resource)) {
            return response()->json('', 204);
        }

        return response()->json($resource);
    }
    
    /**
     * Creates a new category
     */
    public function create(Request $request)
    {
        return response()
            ->json(
                Category::create($request->all()),
                201
            );
    }

    /**
     * Updates a existing category by its id
     */
    public function update(int $id, Request $request)
    {
        $resource = Category::find($id);

        if (is_null($resource)) {
            return response()->json([
                'error' => "Resource with id \"$id\" was not found."
            ], 404);
        }

        $resource->fill($request->all());

        $resource->save();

        return $resource;
    }

    /**
     * Deletes a existing category by its id
     */
    public function destroy(int $id)
    {
        $numberOfAffectedRows = Category::destroy($id);

        if ($numberOfAffectedRows === 0) {
            return response()->json([
                'error' => "Resource with id \"$id\" was not found."
            ], 404);
        }

        return response()->json('', 204);
    }
}
