<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listenposten;
use App\Einkaufsliste;

class EinkaufslisteController extends Controller
{

    public function showLists() {
        return Einkaufsliste::all();
    }

    public function createList(Request $request) {
        $newList = Einkaufsliste::create($request->all());
        return response()->json($newList, 201);
    }

    public function deleteList(int $idList) {
        $list = Einkaufsliste::find($idList);
        $list->delete();
        return response()->json(null, 204);
    }

    public function showListEntries(int $idList) {
        $list = Einkaufsliste::find($idList);
        return $list->entries;
    }

    public function createEntry(Request $request) {
        $newPosten = Listenposten::create($request->all());
        return response()->json($newPosten, 201);
    }

    public function deleteEntry(int $id) {
        $entry = Listenposten::find($id);
        $entry->delete();
        return response()->json(null, 204);
    }
}
