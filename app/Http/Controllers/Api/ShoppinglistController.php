<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        return response()->json(ShoppingList::where('user_id', Auth::user()->id)->get(), Response::HTTP_OK);
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
     *      response=201,
     *      description="Created",
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
        $vals = $request->all();
        $vals['user_id'] = Auth::user()->id;
        $newList = ShoppingList::create($vals);
        return response()->json($newList, Response::HTTP_CREATED);
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
     *   )
     *)
     **/
    public function deleteList(int $idList) {
      try {
        $list = ShoppingList::where('user_id', Auth::user()->id)->where('id', '=', $idList)->firstOrFail();
      } catch(\Exception $ex) {
        return response()->json(['error' => 'list not found for user '.Auth::user()->id], Response::HTTP_BAD_REQUEST);
      }
      $list->delete();
      return response()->json(null, Response::HTTP_OK);
    }

    /**
     * @OA\GET(
     ** path="/list/{idList}/entries",
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
     *   )
     *)
     **/
    public function showListEntries(int $idList) {
        try {
          $list = ShoppingList::where('user_id', Auth::user()->id)->where('id', $idList)->firstOrFail();
        } catch(\Exception $ex) {
          return response()->json(['error' => 'list not found for user '.Auth::user()->id], Response::HTTP_BAD_REQUEST);
        }
        return response()->json($list->entries, Response::HTTP_OK);
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
     *      name="entryname",
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
    public function createEntry(Request $request, int $shopping_list_id) {
        $vals = $request->all();
        try {
          $list = ShoppingList::where('user_id', Auth::user()->id)->where('id', $shopping_list_id)->firstOrFail();
        } catch(\Exception $ex) {
          return response()->json(['error' => 'list not found for user '.Auth::user()->id], Response::HTTP_BAD_REQUEST);
        }
        $vals['shopping_list_id'] = $list->id;
        $newPosten = ShoppingListEntry::create($vals);
        return response()->json($newPosten, Response::HTTP_CREATED);
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
     *      name="$id",
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
     *   )
     *)
     **/
    public function deleteEntry(int $id) {
        $entry = ShoppingListEntry::find($id);
        if($entry->list->user_id != Auth::user()->id) {
          return response()->json(['error' => 'list not found'], Response::HTTP_BAD_REQUEST);
        } else {
          $entry->delete();
          return response()->json(null, Response::HTTP_OK);
        }
    }
}
