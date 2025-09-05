<?php

declare(strict_types=1);

namespace Lightit\Features\Domain\Enums;

enum FeatureFlagEnum: string
{
    case BetaUsersFlag = 'beta_users_flag';
    case TestFlag = 'test_flag';
}
