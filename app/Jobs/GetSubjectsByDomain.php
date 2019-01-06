<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;

use \App\Subject;

class GetSubjectsByDomain
{
    use Dispatchable;

    /**
     * Execute the job, synchronously.
     *
     * @return array
     */
    public function handle()
    {
        $subjects = Subject::all();

        $subjectsByDomain = array();

        foreach ($subjects as $subject) {
            $subjectsByDomain[$subject->domain][] = $subject;
        }

        return $subjectsByDomain;

    }
}
