<?php

namespace App\Service;

use App\Entity\MeetingNote;
use App\Exceptions\InvalidFormDataClassException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class MeetingNoteService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function store(MeetingNote $data): void
    {
        $this->em->persist($data);
        $this->em->flush();
    }
}
