<?php

/*
 * This file is part of the TempoSimple project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TempoSimple\Bundle\SpaghettiBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Templating\EngineInterface;
use TempoSimple\DataSource\DoctrineBundle\Entity\TimeCardRepository;
use TempoSimple\Service\TimeBundle\Factory\DateFactory;
use TempoSimple\Service\TimeTrackingBundle\Timesheet\WeeklyTimesheet;

class GenerateWeeklyReportCommand extends Command
{
    /** @var DateFactory */
    private $dateFactory;

    /** @var WeeklyTimesheet */
    private $weeklyTimesheet;

    /** @var EngineInterface */
    private $templating;

    /**
     * @param DateFactory     $dateFactory
     * @param WeeklyTimesheet $weeklyTimesheet
     * @param EngineInterface   $templating
     */
    public function __construct(
        DateFactory $dateFactory,
        WeeklyTimesheet $weeklyTimesheet,
        EngineInterface $templating
    )
    {
        $this->dateFactory = $dateFactory;
        $this->weeklyTimesheet = $weeklyTimesheet;
        $this->templating = $templating;

        parent::__construct();
    }

    /** {@inheritdoc} */
    protected function configure()
    {
        $this->setName('tempo-simple:generate:weekly-report');
        $this->setAliases(array('weekly'));
    }

    /** {@inheritdoc} */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $projects = $this->weeklyTimesheet->find();

        $view = 'TempoSimpleSpaghettiBundle:Report:weekly.md.twig';
        $parameters = array('projects' => $projects);

        $output->writeln($this->templating->render($view, $parameters));
    }
}
