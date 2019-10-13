<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 13.10.2019
 * Time: 12:17
 */

namespace App;


use SplSubject;

class Listener implements \SplObserver
{

    public function play(string $song): void
    {
        echo is_null($song) ? 'Nothing to play' . PHP_EOL :
            'Playing ' . $song . '...' . PHP_EOL;
    }

    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject)
    {
        /** @var RadioStation $subject */
        $this->play($subject->getSong());
    }
}