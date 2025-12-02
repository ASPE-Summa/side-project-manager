<?php

namespace App\Enum;
enum ProjectStatus: string
{
    case DRAFT = 'DRAFT';
    case STARTED = 'STARTED';
    case IN_PROGRESS = 'IN_PROGRESS';
    case PLANNED = 'PLANNED';
    case ON_HOLD = 'ON_HOLD';
    case DROPPED = 'DROPPED';
}
