<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public User $user;
    public User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();

        $this->user = $this->createUser();
        $this->admin = $this->createUser(isAdmin: true);
    }

    private function createUser(bool $isAdmin = false): User
    {
        return User::factory()->create([
            'is_admin' => $isAdmin
        ]);
    }
}
