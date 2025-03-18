<?php

namespace App;

enum TaskStatusEnum: string
{
    case OPEN = 'open';
    case PENDING = 'pending';
    case INPROGRESS = 'in progress';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}