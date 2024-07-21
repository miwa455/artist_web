<?php

namespace Tests\Unit\Service;

use PHPUnit\Framework\TestCase;
use App\Services\ArtistService;
use Mockery;

class ArtistServiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * A basic unit test example.
     */
    public function test_check_own_tweet()
    {
        $artistService = new ArtistService(); //ArtistServiceのインスタンスを作成

        $mock = Mockery::mock('alias:App\Models\Artist');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);

        $result = $artistService->checkOwnArtist(1, 1);
        $this->assertTrue($result);

        $result = $artistService->checkOwnArtist(2, 1);
        $this->assertFalse($result);
    }
}
