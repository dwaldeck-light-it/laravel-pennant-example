<?php

declare(strict_types=1);

namespace Tests\Feature\Users;

use Database\Factories\UserFactory;
use Illuminate\Http\JsonResponse;
use Lightit\Users\App\Controllers\DeleteUserController;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\deleteJson;

describe('users', function (): void {
    /** @see DeleteUserController */
    it('deletes a user and returns a successful response', function (): void {
        $loggedInUser = UserFactory::new()->createOne();
        actingAs(user: $loggedInUser);

        $existingUser = UserFactory::new()->createOne();
        $response = deleteJson("api/users/$existingUser->id");
        $response->assertStatus(JsonResponse::HTTP_OK);

        assertDatabaseMissing('users', ['id' => $existingUser->id]);
    });

    it('returns a 404 response when user is not found', function (): void {
        $loggedInUser = UserFactory::new()->createOne();
        actingAs(user: $loggedInUser);

        $nonExistentUserId = 99999;

        deleteJson("api/users/$nonExistentUserId")
            ->assertStatus(JsonResponse::HTTP_NOT_FOUND);
    });
});
