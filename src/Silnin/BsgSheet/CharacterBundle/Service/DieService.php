<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

class DieService
{
    /**
     * translates a die type (integer 1 to infinite) into a string of dice from d2 to d12. 1=d2,6=d12, interval of 2
     *
     * @param integer $die
     * @return string
     */
    public function translateDie($die) {
        $result = '';

        if ($die == 0) {
            return '0';
        }

        if ($die > 6) {
            $result .= '+d12';
            $die -= 6;
            $result .= $this->translateDie($die);
        } else
        {
            $result .= '+d' . ($die*2);
        }

        return $result;
    }
}
