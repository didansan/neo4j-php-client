<?php

/*
 * This file is part of the GraphAware Neo4j Client package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Neo4j\Client\Event;

use GraphAware\Neo4j\Client\Exception\Neo4jExceptionInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class FailureEvent extends EventDispatcher
{
    /**
     * @var Neo4jExceptionInterface
     */
    protected Neo4jExceptionInterface $exception;

    /**
     * @var bool
     */
    protected bool $shouldThrowException = true;

    /**
     * @param Neo4jExceptionInterface $exception
     */
    public function __construct(Neo4jExceptionInterface $exception)
    {
        parent::__construct();
        $this->exception = $exception;
    }

    /**
     * @return Neo4jExceptionInterface
     */
    public function getException(): Neo4jExceptionInterface
    {
        return $this->exception;
    }

    public function disableException(): void
    {
        $this->shouldThrowException = false;
    }

    /**
     * @return bool
     */
    public function shouldThrowException(): bool
    {
        return $this->shouldThrowException;
    }
}
