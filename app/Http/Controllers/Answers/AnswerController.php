<?php

namespace App\Http\Controllers\Answers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Event;
use App\Models\Rate;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index(Answer $answer, Event $event)
    {
        $answers = Answer::all();
        return view('answers.index', ['answers' => $answers], compact('event'));
    }

    public function show(Answer $answer)
    {
        return view('answers.show', compact('answer'));
    }

    public function store(Request $request, Rate $rate, Event $event, Answer $answer)
    {
        $data = $request->validate([
            'answer_author_id' => 'required|integer',
            'event_id' => 'required|integer',
            'rate' => 'required|integer',
        ]);

        Rate::updateOrCreate(
            [
            'answer_author_id' => request('answer_author_id'),
            'event_id' => request('event_id')
            ],
            [
                'rate' => request('rate')
            ]);

        return redirect()->route('answers', ['event' => $answer->event->id])->with('rate', 'Оценка поставлена!');
    }
}
