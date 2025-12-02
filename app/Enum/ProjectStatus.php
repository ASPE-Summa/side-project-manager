<?php

namespace App\Enum;
enum ProjectStatus: string
{
    case DRAFT = 'DRAFT';
    case IN_PROGRESS = 'IN_PROGRESS';
    case PLANNED = 'PLANNED';
    case ON_HOLD = 'ON_HOLD';
    case DROPPED = 'DROPPED';
    case COMPLETED = 'COMPLETED';
}
