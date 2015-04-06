<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

use Doctrine\ORM\EntityManager;
//use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Silnin\BsgSheet\CharacterBundle\Entity\Rank;

class RankService
{
    /** @var EntityManager  */
    protected $entityManager;

    /** @var CharacterSecurityService  */
    protected $securityService;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    /**
     * @param string $rankName
     * @return Rank
     */
    public function createRank($rankName)
    {
        switch ($rankName) {
            case Rank::RANK_NANE_SEASONED_VETERAN:
                return $this->createSeasonedVeteran();
                break;
            case Rank::RANK_NANE_VETERAN:
                return $this->createVeteran();
                break;
            case Rank::RANK_NANE_RECRUIT:
            default:
                return $this->createRecruit();
                break;
        }
    }

    /**
     * @return Rank
     */
    private function createRecruit()
    {
        $rank = new Rank();
        $rank->setName(ucfirst(Rank::RANK_NANE_RECRUIT));
        $rank->setAttributePoints(Rank::ATTRIBUTE_POINTS_RECRUIT);
        $rank->setSkillPoints(Rank::SKILL_POINTS_RECRUIT);
        $rank->setTraitPoints(Rank::TRAIT_POINTS_RECRUIT);

        return $rank;
    }

    /**
     * @return Rank
     */
    private function createVeteran()
    {
        $rank = new Rank();
        $rank->setName(ucfirst(Rank::RANK_NANE_VETERAN));
        $rank->setAttributePoints(Rank::ATTRIBUTE_POINTS_RECRUIT);
        $rank->setSkillPoints(Rank::SKILL_POINTS_RECRUIT);
        $rank->setTraitPoints(Rank::TRAIT_POINTS_RECRUIT);

        return $rank;
    }

    /**
     * @return Rank
     */
    private function createSeasonedVeteran()
    {
        $rank = new Rank();
        $rank->setName(ucfirst(Rank::RANK_NANE_SEASONED_VETERAN));
        $rank->setAttributePoints(Rank::ATTRIBUTE_POINTS_RECRUIT);
        $rank->setSkillPoints(Rank::SKILL_POINTS_RECRUIT);
        $rank->setTraitPoints(Rank::TRAIT_POINTS_RECRUIT);

        return $rank;
    }
}