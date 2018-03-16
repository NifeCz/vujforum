<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{

    public function index()
    {
        // pužití question resrouce pro každej řádek, s tím že budeš vracet jen data která chceš, která máš nastavená
        // v QuestionResource
        return QuestionResource::collection(Question::latest()->get());
    }

    public function store(Request $request)
    {
        //pomocí vztahu question v modelu user ošetříš že bude user_id
        auth()->user()->question()->create($request->all());

        //Question::create($request->all());
        return response('Created', 201);
    }

    public function show(Question $question)
    {
        //vrací výsledek v data
        return new QuestionResource($question);
    }

    public function update(Request $request, Question $question)
    {
        //
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
