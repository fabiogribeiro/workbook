<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Challenge;
use App\Subject;

class CreateChallenge implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array Data sent from the request
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @param array $requestData
     * @return void
     */
    public function __construct($requestData)
    {
        $this->data = $requestData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $challenge = new Challenge;

        $subjectId = Subject::where('slug', $data['subject'])->first()->id;

        $challenge->title = $data['title'];
        $challenge->body = $data['body'];
        $challenge->body_html = (new Parsedown)->text($data['body']);
        $challenge->answer = $data['answer'];
        $challenge->slug = str_slug($data['title']);
        $challenge->subject_id = $subjectId;
        $challenge->skill = $data['skill'];

        $challenge->save();
    }
}
