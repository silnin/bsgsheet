<?php

namespace Silnin\SilninUserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * ProductRepository
 */
class UserRepository extends EntityRepository
{
    /**
     * @param $email
     * @return mixed|null
     */
    public function getUserByEmailAddress($email)
    {
        $query = $this->createQueryBuilder('user')
            ->where('user.email = :email')
            ->setParameter('email', $email)
            ->getQuery();
        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }
}