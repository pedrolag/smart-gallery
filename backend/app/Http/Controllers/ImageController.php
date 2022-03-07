<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController
{
    private $uploadFolderUrl = 'images';

    /**
     * Gets all registered categories
     */
    public function getAll()
    {
        return Image::all();
    }

    /**
     * Gets an specific Image by its id
     */
    public function getById(int $id)
    {
        $resource = Image::find($id);

        if (is_null($resource)) {
            return response()->json('', 204);
        }

        return response()->json($resource);
    }
    
    /**
     * Creates a new Image
     */
    public function create(Request $request)
    {
        $image = $request->file('image');

        if (!$request->hasFile('image')) {
            return response()
                ->json(
                    "Invalid file.",
                    400
                );
        }

        $newImageName = $request->name . "." . $image->getClientOriginalExtension();

        $newImageUrl = "http://localhost:8000/images/$newImageName";

        $newImageFavorited = filter_var($request->favorited, FILTER_VALIDATE_BOOLEAN);

        $image->move(
            app()->basePath("public/$this->uploadFolderUrl"),
            $newImageName
        );

        $newImage = [
            "name" => $newImageName,
            "description" => $request->description,
            "favorited" => $newImageFavorited,
            "url" => $newImageUrl
        ];

        Image::create($newImage);

        return response()
            ->json(
                $newImage,
                201
            );
    }

    /**
     * Updates a existing Image by its id
     */
    public function update(int $id, Request $request)
    {
        $resource = Image::find($id);

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
     * Deletes a existing Image by its id
     */
    public function destroy(int $id)
    {
        $numberOfAffectedRows = Image::destroy($id);

        if ($numberOfAffectedRows === 0) {
            return response()->json([
                'error' => "Resource with id \"$id\" was not found."
            ], 404);
        }

        return response()->json('', 204);
    }
}
