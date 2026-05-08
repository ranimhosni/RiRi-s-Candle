<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    public function up(): void
{
    // On ne tente la suppression que si on n'est pas sur SQLite
    if (config('database.default') !== 'sqlite') {
        Schema::table('user_addresses', function (Blueprint $table) {
            $table->dropColumn('country_code');
        });
    }
}
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
