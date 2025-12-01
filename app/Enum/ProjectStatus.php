<?php

namespace App\Enum;
enum ProjectStatus: string
{
    case DRAFT = 'DRAFT';
    case STARTED = 'STARTED';
    case IN_PROGRESS = 'IN_PROGRESS';
    case DROPPED = 'DROPPED';
}
