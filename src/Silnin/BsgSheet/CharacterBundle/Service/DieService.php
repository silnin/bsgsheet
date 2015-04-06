<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

class DieService
{
    const DIE_0 = '';
    const DIE_1 = 'd2';
    const DIE_2 = 'd4';
    const DIE_3 = 'd6';
    const DIE_4 = 'd8';
    const DIE_5 = 'd10';
    const DIE_6 = 'd12';
    const DIE_7 = 'd12+d2';
    const DIE_8 = 'd12+d4';
    const DIE_9 = 'd12+d6';
    const DIE_10 = 'd12+d8';
    const DIE_11 = 'd12+d10';
    const DIE_12 = 'd12+d12';

    // i might want to use this for translations. die 1 = d2, die 2 = d4...that we i can do 'allowed dice' for skills, for example....its a hashmap i guess
    public function translateDie($die) {
        $constName = 'DIE_' . $die;
        return self::$$constName;
    }
}
