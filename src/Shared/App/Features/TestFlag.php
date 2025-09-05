<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Features;

use Lightit\Features\Domain\Enums\FeatureFlagEnum;

class TestFlag
{
    public string $name = FeatureFlagEnum::TestFlag->value;

    /**
     * Resolve the feature's initial value.
     */
    public function resolve(): bool
    {
        return false;
    }
}
