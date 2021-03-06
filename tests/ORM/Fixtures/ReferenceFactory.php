<?php declare(strict_types=1);
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

namespace Cycle\ORM\Tests\Fixtures;

use Cycle\ORM\ORMInterface;
use Cycle\ORM\Promise\PromiseOne;
use Cycle\ORM\Promise\ReferenceInterface;
use Cycle\ORM\PromiseFactoryInterface;

class ReferenceFactory implements PromiseFactoryInterface
{
    public function promise(ORMInterface $orm, string $role, array $scope): ?ReferenceInterface
    {
        switch ($role) {
            case 'user':
                return new UserID(current($scope));
        }

        return new PromiseOne($orm, $role, $scope);
    }
}