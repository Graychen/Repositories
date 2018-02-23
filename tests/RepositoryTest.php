<?php

namespace graychen\repositories\test;
use Mockery;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Console\Kernel;

class RepositoryTest extends TestCase
{
    protected $mock;

    protected $repository;

    public function setUp()
    {
        $this->mockWebApplication();
        $this->mock=Mockery::mock('Illuminate\Database\Eloqument\Model');
    }

    public function testRepository()
    {
        $this->assertTrue(true);
    }

    private function mockWebApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        Hash::driver('bcrypt')->setRounds(4);
        return $app;
    }
}
