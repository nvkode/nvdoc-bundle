<?php

declare(strict_types=1);

namespace Nvkode\NvdocBundle;

use Nvkode\NvdocBundle\Compiler\TwigCompiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NvdocBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TwigCompiler());
    }
}
