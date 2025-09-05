<?php

declare(strict_types=1);

namespace Lightit\Features\App\Controllers;

use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\JsonResponse;
use Laravel\Pennant\Feature;
use Lightit\Users\Domain\Models\User;

final readonly class ListFeaturesController
{
    public function __invoke(#[CurrentUser] User|null $user): JsonResponse
    {
        return response()->json(Feature::for($user)->all());
    }
}
