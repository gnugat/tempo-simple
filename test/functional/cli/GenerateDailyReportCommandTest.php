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

class GenerateDailyReportCommandTest extends CommandTestCase
{
    public function testExecute()
    {
        $parameters = array();

        $command = 'tempo_simple_spaghetti.generate_daily_report_command';

        $this->givenThisCommand($command);
        $this->whenItIsRun($parameters);
        $this->thenItShouldSuceed();
    }
}
