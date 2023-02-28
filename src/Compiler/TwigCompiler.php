<?php

namespace Nvkode\NvdocBundle\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TwigCompiler implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $definition = 'twig.loader.native_filesystem';

        if ($container->hasDefinition($definition)) {
            $bundleDirectory = dirname(__DIR__, 2);
            $twigFilesystemLoaderDefinition = $container->getDefinition($definition);
            $twigFilesystemLoaderDefinition->addMethodCall('addPath', [$bundleDirectory . '/templates', 'Nvdoc']);
        }
    }
}