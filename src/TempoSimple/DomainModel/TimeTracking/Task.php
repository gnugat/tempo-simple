<?php

/*
 * This file is part of the TempoSimple project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TempoSimple\DomainModel\TimeTracking;

class Task
{
    /** @var string **/
    private $projectName;

    /** @var string **/
    private $title;

    /** @var array of TimeCard **/
    private $timeCards;

    /**
     * @param string $projectName
     * @param string $title
     */
    public function __construct($projectName, $title)
    {
        $this->projectName = $projectName;
        $this->title = $title;
        $this->timeCards = array();
    }

    /** @return string **/
    public function getTitle()
    {
        return $this->title;
    }

    public function getProjectName()
    {
        return $this->projectName;
    }

    /** @param TimeCard $timeCard */
    public function addTimeCard(TimeCard $timeCard)
    {
        $this->timeCards[] = $timeCard;
    }

    /** @return float **/
    public function getTotalWorkingHours()
    {
        $totalWorkingHours = 0.0;
        foreach ($this->timeCards as $timeCard) {
            $totalWorkingHours += $timeCard->getWorkingHours();
        }
        return $totalWorkingHours;
    }

    /** @return float **/
    public function getTotalWorkingDays()
    {
        $totalWorkingDays = $this->getTotalWorkingHours() / 8.0;

        return $totalWorkingDays;
    }
}
