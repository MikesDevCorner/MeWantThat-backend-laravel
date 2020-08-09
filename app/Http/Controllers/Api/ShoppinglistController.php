<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\ShoppingListEntry;
use App\ShoppingList;
use App\Http\Controllers\Controller;


class ShoppinglistController extends Controller
{

    /**
     * @OA\GET(
     ** path="/lists",
     *   tags={"List"},
     *   summary="Shows all available shopping lists for this user",
     *   operationId="showLists",
     *   security={
     *   {
     *      "passport": {}},
     *   },
     *  @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *)
     **/
    public function showLists() {
        return ShoppingList::all();
    }

    /**
     * @OA\POST(
     ** path="/list",
     *   tags={"List"},
     *   summary="Creates a new shopping list for this user",
     *   operationId="createLists",
     *   security={
     *   {
     *      "passport": {}},
     *   },
     *  @OA\Parameter(
     *      name="listname",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   )
     *)
     **/
    public function createList(Request $request) {
        $newList = ShoppingList::create($request->all());
        return response()->json($newList, 201);
    }

    /**
     * @OA\DELETE(
     ** path="/list/{idList}",
     *   tags={"List"},
     *   summary="Deletes users shopping list with the given ID",
     *   operationId="deleteList",
     *   security={
     *   {
     *      "passport": {}},
     *   },
     *  @OA\Parameter(
     *      name="idList",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *   @OA\Response(
     *       response=403,
     *       description="Forbidden"
     *   )
     *)
     **/
    public function deleteList(int $idList) {
        $list = ShoppingList::find($idList);
        $list->delete();
        return response()->json(null, 204);
    }

    /**
     * @OA\GET(
     ** path="list/{idList}/entries",
     *   tags={"List"},
     *   summary="Shows all available shopping list entries from the given shopping list for this user",
     *   operationId="showListEntries",
     *   security={
     *   {
     *      "passport": {}},
     *   },
     *  @OA\Parameter(
     *      name="idList",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *   @OA\Response(
     *       response=403,
     *       description="Forbidden"
     *   )
     *)
     **/
    public function showListEntries(int $idList) {
        $list = ShoppingList::find($idList);
        return $list->entries;
    }

    /**
     * @OA\POST(
     ** path="/list/{idList}/entry",
     *   tags={"List"},
     *   summary="Creates a new shopping list entry on the given shopping list for this user",
     *   operationId="createEntry",
     *   security={
     *   {
     *      "passport": {}},
     *   },
     *  @OA\Parameter(
     *      name="idList",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="listname",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="amount",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   )
     *)
     **/
    public function createEntry(Request $request) {
        $newPosten = ShoppingListEntry::create($request->all());
        return response()->json($newPosten, 201);
    }

    /**
     * @OA\DELETE(
     ** path="/entry/{idList}",
     *   tags={"List"},
     *   summary="Deletes users shopping list entry with the given ID, regardless on wich list it is. It must be owned by the user, tho.",
     *   operationId="deleteList",
     *   security={
     *   {
     *      "passport": {}},
     *   },
     *  @OA\Parameter(
     *      name="idList",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *   @OA\Response(
     *       response=403,
     *       description="Forbidden"
     *   )
     *)
     **/
    public function deleteEntry(int $id) {
        $entry = ShoppingListEntry::find($id);
        $entry->delete();
        return response()->json(null, 204);
    }
}
