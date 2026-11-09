<?php

namespace Tests\Feature\Security;

use Tests\TestCase;

class RateLimitingTest extends TestCase
{
    public function test_login_is_throttled_after_five_attempts(): void
    {
        $this->withServerVariables([
            'REMOTE_ADDR' => '192.0.2.11',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $response = $this->post('/login', []);

            $this->assertNotEquals(
                429,
                $response->getStatusCode(),
                "Login request ke-{$i} tidak seharusnya terkena rate limit."
            );
        }

        $response = $this->post('/login', []);

        $response->assertStatus(429);
    }

    public function test_area_kampus_submission_is_throttled_after_five_attempts(): void
    {
        $this->withServerVariables([
            'REMOTE_ADDR' => '192.0.2.12',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $response = $this->post(
                route('area-kampus.store'),
                []
            );

            $this->assertNotEquals(
                429,
                $response->getStatusCode(),
                "Request Area Kampus ke-{$i} tidak seharusnya terkena rate limit."
            );
        }

        $response = $this->post(
            route('area-kampus.store'),
            []
        );

        $response->assertStatus(429);
    }

    public function test_praktik_lainnya_submission_is_throttled_after_five_attempts(): void
    {
        $this->withServerVariables([
            'REMOTE_ADDR' => '192.0.2.13',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $response = $this->post(
                route('praktik-lainnya.store'),
                []
            );

            $this->assertNotEquals(
                429,
                $response->getStatusCode(),
                "Request Praktik Lainnya ke-{$i} tidak seharusnya terkena rate limit."
            );
        }

        $response = $this->post(
            route('praktik-lainnya.store'),
            []
        );

        $response->assertStatus(429);
    }
}
