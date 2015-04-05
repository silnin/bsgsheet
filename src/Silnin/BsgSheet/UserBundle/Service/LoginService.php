<?php
namespace Silnin\BsgSheet\UserBundle\Service;

use Doctrine\ORM\EntityManager;
use Silnin\BsgSheet\UserBundle\Entity\User;
use Silnin\BsgSheet\UserBundle\Entity\UserRepository;

class LoginService
{
    /** @var \Silnin\BsgSheet\UserBundle\Entity\UserRepository  */
    protected $repository;

    /** @var \Doctrine\ORM\EntityManager  */
    protected $entityManager;

    public function __construct(
        UserRepository $repository,
        EntityManager $em
    ) {
        $this->repository = $repository;
        $this->entityManager = $em;
    }

    public function getMeSome()
    {
        $user = $this->repository->getUserByEmailAddress('gft_bak@hotmail.com');
        return $user->getNickname();

    }

    public function saveUser(User $user)
    {
        //@todo: probably want some validation, but whatever

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
