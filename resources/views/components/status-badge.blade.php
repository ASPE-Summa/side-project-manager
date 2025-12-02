<?php

use App\Enum\ProjectStatus;

?>
@if ($status == ProjectStatus::DRAFT)
    <span
        class="inline-flex items-center rounded-md bg-dark-dim px-2 py-1 text-xs font-medium text-grey-0 inset-ring inset-ring-gray-400/20">
        DRAFT
    </span>
@elseif($status == ProjectStatus::IN_PROGRESS)
    <span
        class="inline-flex items-center rounded-md bg-dark-blue px-2 py-1 text-xs font-medium text-primary inset-ring inset-ring-green-500/20">
        IN_PROGRESS
    </span>
@elseif($status == ProjectStatus::DROPPED)
    <span
        class="inline-flex items-center rounded-md bg-dark-red px-2 py-1 text-xs font-medium text-danger inset-ring inset-ring-red-400/20">
        DROPPED
    </span>
@elseif($status == ProjectStatus::PLANNED)
    <span
        class="inline-flex items-center rounded-md bg-dark-purple px-2 py-1 text-xs font-medium text-purple inset-ring inset-ring-purple-400/30">
        PLANNED
    </span>
@elseif($status == ProjectStatus::ON_HOLD)
    <span
        class="inline-flex items-center rounded-md bg-dark-yellow px-2 py-1 text-xs font-medium text-warning inset-ring inset-ring-yellow-400/20">
        ON_HOLD
    </span>
@elseif($status == ProjectStatus::COMPLETED)
    <span
        class="inline-flex items-center rounded-md bg-dark-green px-2 py-1 text-xs font-medium text-success inset-ring inset-ring-yellow-400/20">
        COMPLETED
    </span>
@endif
