<?php

namespace App\Faker;

use \Faker\Provider\Base as Base;

class Question extends Base
{
  /**
   * Creates a question in any of the following types:
   * 0 - Multiple choice
   * 1 - Numeric input
   * 2 - Symbolic input
   *
   * @param int $type
   * @return array
   */
  public function question($type = 0)
  {
    $title = $this->generator->sentence(6, true) . '?';

    $answer = $type === 0 ?
                $this->generator->randomElement(array('A', 'B', 'C')) :
                $this->generator->randomFloat(2, -10, 10);

    if ($type === 0) {
      $choices = $this->generator->sentences(3);

      return compact('title', 'type', 'answer', 'choices');
    }

    return compact('title', 'type', 'answer');
  }

  /**
   * Return a randomly generated number of questions
   *
   * @param int $nbQuestions
   * @return array
   */
  public function questions($nbQuestions = 1)
  {
    $questions = [];

    for ($i = 0; $i < $nbQuestions; ++$i) {
      $questionType = $this->generator->numberBetween(0, 2);
      $questions[] = $this->question($questionType);
    }

    return $questions;
  }
}
