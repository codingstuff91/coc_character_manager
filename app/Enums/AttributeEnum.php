<?php

namespace App\Enums;

enum AttributeEnum: int
{
    case STRENGTH = 1;
    case DEXTERITY = 2;
    case CONSTITUTION = 3;
    case PERCEPTION = 4;
    case CHARISMA = 5;
    case INTELLIGENCE = 6;
    case INITIATIVE = 7;
    case DEFENSE = 8;
    case ARMOR = 9;
    case CONTACT_ATTACK = 10;
    case DISTANT_ATTACK = 11;
    case MAGIC_ATTACK = 12;
    case LIFE_DICE_SCORE = 13;
    case HEALTH_POINTS = 14;
    case HEALTH_POINTS_MAX = 15;
    case BAD_INJURY = 16;
    case DAMAGE_RESISTANCE = 17;
    case LUCK_P0INTS = 18;
    case LUCK_POINTS_MAX = 19;
    case LIFE_LEVEL = 20;
}
