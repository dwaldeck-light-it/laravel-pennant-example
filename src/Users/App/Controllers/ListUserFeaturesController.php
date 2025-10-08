<?php

declare(strict_types=1);

namespace Lightit\Users\App\Controllers;

use Illuminate\Http\JsonResponse;

final readonly class ListUserFeaturesController
{
    public function __invoke(): JsonResponse
    {
        return response()->json();
    }
}
