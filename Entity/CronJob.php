<?php

namespace JMS\JobQueueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'jms_cron_jobs')]
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
class CronJob
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: \Doctrine\DBAL\Types\Types::INTEGER, options: ['unsigned' => true])]
    private $id;

    #[ORM\Column(type: 'datetime', name: 'lastRunAt')]
    private ?\DateTimeInterface $lastRunAt = null;

    public function __construct(#[ORM\Column(type: 'string', length: 200, unique: true)]
    private $command)
    {
        $this->lastRunAt = new \DateTime();
    }

    public function getCommand()
    {
        return $this->command;
    }

    public function getLastRunAt()
    {
        return $this->lastRunAt;
    }
}
