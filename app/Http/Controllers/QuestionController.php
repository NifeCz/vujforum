<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{

    public function index()
    {
        return Question::latest()->get();
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
        return $question;
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
