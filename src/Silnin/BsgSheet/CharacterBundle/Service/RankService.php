<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

use Silnin\BsgSheet\CharacterBundle\Entity\Rank;

class RankService
{
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
        return new Rank(
            ucfirst(Rank::RANK_NANE_RECRUIT),
            Rank::ATTRIBUTE_POINTS_RECRUIT,
            Rank::SKILL_POINTS_RECRUIT,
            Rank::TRAIT_POINTS_RECRUIT
        );
    }

    /**
     * @return Rank
     */
    private function createVeteran()
    {
        return new Rank(
            ucfirst(Rank::RANK_NANE_VETERAN),
            Rank::ATTRIBUTE_POINTS_VETERAN,
            Rank::SKILL_POINTS_VETERAN,
            Rank::TRAIT_POINTS_VETERAN
        );
    }

    /**
     * @return Rank
     */
    private function createSeasonedVeteran()
    {
        return new Rank(
            ucfirst(Rank::RANK_NANE_SEASONED_VETERAN),
            Rank::ATTRIBUTE_POINTS_SEASONED_VETERAN,
            Rank::SKILL_POINTS_SEASONED_VETERAN,
            Rank::TRAIT_POINTS_SEASONED_VETERAN
        );
    }
}