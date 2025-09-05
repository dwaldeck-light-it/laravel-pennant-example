<?php

declare(strict_types=1);

namespace Lightit\Users\App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Pennant\Feature;
use Lightit\Shared\App\Features\BetaUsersFlag;
use Lightit\Users\Domain\Models\User;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    /**
     * @return array{id: int, name: string, email_address: string, beta_notes: mixed}
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email_address' => $this->email,
            'beta_notes' => $this->when(
                Feature::active(BetaUsersFlag::class),
                'This field is visible only to beta testers'
            ),
        ];
    }
}
