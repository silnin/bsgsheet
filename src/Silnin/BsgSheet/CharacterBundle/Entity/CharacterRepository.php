<?php

namespace Silnin\BsgSheet\CharacterBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;


class CharacterRepository extends EntityRepository
{
    /**
     * @param integer $id
     * @return mixed|null
     */
    public function getCharacterById($id)
    {
        $query = $this->createQueryBuilder('character')
            ->where('character.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }
}