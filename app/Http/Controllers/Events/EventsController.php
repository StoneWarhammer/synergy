<?php

namespace App\Http\Controllers\Events;

use App\Events\StoreEventsEvent;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\AnswerFiles;
use App\Models\Event;
use App\Models\EventFiles;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Event $event)
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }

    public function create(Event $event, Group $group)
    {
        $events = Event::all();
        $groups = Group::all();
        return view('events.create', ['events' => $events, 'groups' => $groups]);
    }

    public function store(Request $request, Event $event)
    {

        $data = $request->validate([
            'title' => 'required|min:2|max:150|string',
            'subtitle' => 'max:150',
            'task' => 'required|max:20000|string',
            'author_id' => 'required|integer',
            'start_time' => 'required|date',
            'group' => 'required|string',
            'end_time' => 'required|date|after_or_equal:start_time',
        ]);

        $request->validate([
            'file' => 'max:20480',
        ]);

        Event::create($data);

//       Сохранение файлов

        $events = Event::all();
        $paths = [];

        foreach ($request->file('file') as $file)
        {
            $paths[] = $file->store('events/files', 'public');
        }

        foreach ($paths as $path)
        {
            EventFiles::create([
                'file' => $path,
                'event_id' => $events->max('id'),
            ]);
        }

        return redirect()->route('events');
    }

    public function show(Event $event, EventFiles $eventFiles, User $user)
    {
        $users = User::all();
        $events = Event::all();
        return view('events.show', compact('event'), ['users' => $users, 'events' => $events]);
    }

    public function show_store(Request $request, Answer $answer, AnswerFiles $answerFiles)
    {
        $data = $request->validate([
            'answer' => 'required|max:20000|string',
            'answer_author_id' => 'required|integer',
            'answer_event_id' => 'required|integer',
        ]);

        $request->validate([
            'file' => 'max:20480',
        ]);

        Answer::updateOrCreate(
            [
                'answer_author_id' => request('answer_author_id'),
                'answer_event_id' => request('answer_event_id')
            ],
            ($data));

//        Сохранение файлов
        $answers = Answer::all();
        $paths = [];

        if ($request->file('file') === true)
        {
            foreach ($request->file('file') as $file)
            {
                $paths[] = $file->store('events/files', 'public');
            }

            foreach ($paths as $path)
            {
                AnswerFiles::create([
                    'file' => $path,
                    'answer_id' => $answer->max('id'),
                ]);
            }
        }

        return redirect()->route('events');
    }
}
