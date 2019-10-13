<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 13.10.2019
 * Time: 12:12
 */

namespace App;


use SplObserver;
use SplSubject;

class RadioStation implements SplSubject
{
    /**
     * @var \SplObjectStorage
     */
    private $listeners;

    /**
     * @var string|null
     */
    private $song = null;

    public function __construct()
    {
        $this->listeners = new \SplObjectStorage();
    }

    public function setSong(string $song): void
    {
        $this->song = $song;
        $this->notify();
    }

    public function getSong(): string
    {
        return $this->song;
    }

    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function attach(SplObserver $observer)
    {
        $this->listeners->attach($observer);
    }

    /**
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function detach(SplObserver $observer)
    {
        $this->listeners->detach($observer);
    }

    /**
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify()
    {
        /** @var Listener $listener */
        foreach ($this->listeners as $listener) {
            $listener->update($this);
        }
    }
}