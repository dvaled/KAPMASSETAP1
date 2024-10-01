<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Types",
 *     description="Operations about types"
 * )
 */
class TypeController extends Controller
{
        /**
     * @OA\Get(
     *     path="/api/types",
     *     summary="Get list of types",
     *     tags={"Types"},
     *     @OA\Response(
     *         response=200,
     *         description="A list of types",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Type"))
     *     )
     * )
     */
    //fetch all data
    public function index()
    {
        $types = Type::all();
        return response()->json($types, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/types/{MasterID}",
     *     summary="Get a type by ID",
     *     tags={"Types"},
     *     @OA\Parameter(
     *         name="MasterID",
     *         in="path",
     *         required=true,
     *         description="The ID of the type",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Type details",
     *         @OA\JsonContent(ref="#/components/schemas/Type")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Type not found"
     *     )
     * )
     */
    public function show($id)
    {
        $type = Type::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        return response()->json($type, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/types",
     *     summary="Create a new type",
     *     tags={"Types"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Type")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Type created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Type")
     *     )
     * )
     */
    //store new type
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Condition' => 'required',
            'NoSr' => 'required',
            'Description' => 'required',
            'ValueGcm' => 'required',
            'Type_Gcm' => 'required',
            'Active' => 'required|boolean',
        ]);

        $type = Type::create($validatedData);
        return response()->json(['message' => 'Type created successfully', 'data' => $type], 201);
    }

    
    public function update(Request $request, $id)
    {
        $type = Type::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        $validatedData = $request->validate([
            'Condition' => 'required',
            'NoSr' => 'required',
            'Description' => 'required',
            'ValueGcm' => 'required',
            'Type_  Gcm' => 'required',
            'Active' => 'required|boolean',
        ]);

        $type->update($validatedData);
        return response()->json(['message' => 'Type updated successfully', 'data' => $type], 200);
    }

    // Delete a type
    public function destroy($id)
    {
        $type = Type::find($id);

        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        $type->delete();
        return response()->json(['message' => 'Type deleted successfully'], 200);
    }
}


