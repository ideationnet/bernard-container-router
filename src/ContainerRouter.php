<?php

namespace Bernard\ContainerInterop;

use Bernard\Router\SimpleRouter;
use Interop\Container\ContainerInterface;

class ContainerRouter extends SimpleRouter
{
    /** @var ContainerInterface */
    private $container;

    public function __construct(ContainerInterface $container, array $receivers = [])
    {
        $this->container = $container;
        parent::__construct($receivers);
    }

    protected function get($name)
    {
        $serviceId = parent::get($name);

        return $this->container->get($serviceId);
    }

    protected function accepts($receiver)
    {
        return $this->container->has($receiver);
    }

}
