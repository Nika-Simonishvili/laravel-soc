<?php

namespace App\Enums;

enum FriendStatusEnum: string
{
    case Accepted = 'accepted';
    case Pending = 'pending';
    case Rejected = 'rejected';
}
