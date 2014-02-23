<?php

/*
 * This file is part of the TempoSimple project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TempoSimple\Test\Functional\Cli;

use TempoSimple\Bundle\SpaghettiBundle\Command\PunchTimeCardCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;

class PunchTimeCardCommandTest extends CommandTestCase
{
    public function testExecute()
    {
        $parameters = array(
            'task' => 'task',
            'start-hour' => '07:45',
            'end-hour' => '08:00',
        );

        $this->givenThisCommand(new PunchTimeCardCommand());
        $this->whenItIsRun($parameters);
        $this->thenItShouldSuceed();
    }
}
