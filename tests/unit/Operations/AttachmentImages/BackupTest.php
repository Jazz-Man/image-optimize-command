<?php

declare(strict_types=1);

namespace TypistTech\ImageOptimizeCommand\Operations\AttachmentImages;

use Codeception\Test\Unit;
use Mockery;
use TypistTech\ImageOptimizeCommand\CLI\Logger;
use TypistTech\ImageOptimizeCommand\Operations\Backup as BackupOperation;
use TypistTech\ImageOptimizeCommand\Repositories\AttachmentRepository;

class BackupTest extends Unit
{
    /**
     * @var \TypistTech\ImageOptimizeCommand\UnitTester
     */
    protected $tester;

    public function testSomeFeature()
    {
        $repo = Mockery::mock(AttachmentRepository::class);
        $repo->expects('getFullSizedPaths')
             ->with(1, 2, 3)
             ->andReturn([
                 '/my/path/1.png',
                 '/my/path/2.jpg',
                 '/my/path/3.jpeg',
             ])
             ->once();

        $backupOperation = Mockery::mock(BackupOperation::class);
        $backupOperation->expects('execute')
                        ->with(
                            '/my/path/1.png',
                            '/my/path/2.jpg',
                            '/my/path/3.jpeg'
                        )
                        ->once();

        $logger = Mockery::spy(Logger::class);

        $backup = new Backup($repo, $backupOperation, $logger);

        $backup->execute(1, 2, 3);

        $logger->shouldHaveReceived('section')
               ->with('Backing up full sized images for 3 attachment(s)')
               ->once();
    }
}
