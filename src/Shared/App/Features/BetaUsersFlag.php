<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Features;

use Lightit\Features\Domain\Enums\FeatureFlagEnum;
use Lightit\Users\Domain\Models\User;

class BetaUsersFlag
{
    public string $name = FeatureFlagEnum::BetaUsersFlag->value;

    /**
     * Resolve the feature's initial value.
     */
    public function resolve(User $user): mixed
    {
        return match (true) {
            $user->is_beta_tester => true,
            default => false,
        };
    }
}
