<?php

namespace App;

enum StatusEnum: string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in progress';
    case PENDING = 'pending';
    case BLOCKED = 'blocked';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';
}
