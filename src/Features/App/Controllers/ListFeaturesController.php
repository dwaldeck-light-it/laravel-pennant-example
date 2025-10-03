<?php

declare(strict_types=1);

namespace Lightit\Features\App\Controllers;

use Illuminate\Http\JsonResponse;
use QodeNL\LaravelPosthog\Facades\Posthog;

final readonly class ListFeaturesController
{
    public function __invoke(): JsonResponse
    {
        return response()->json(Posthog::getAllFlags());
    }
}
