<?php

/**
 * NvdocBundle
 * PHP Version >= 8.1
 *
 * @category Nvdoc
 * @package  NvdocBundle
 * @author   Mykyta Melnyk <liswelus@gmail.com>
 * @license  MIT <https://github.com/nvkode/nvdoc-bundle/blob/development/LICENSE>
 * @link     https://github.com/nvkode/nvdoc-bundle
 */

declare(strict_types=1);

namespace Nvkode\NvdocBundle\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * TwigCompiler Class
 *
 * @category Compiler
 * @package  NvdocBundle
 * @author   Mykyta Melnyk <liswelus@gmail.com>
 * @license  MIT <https://github.com/nvkode/nvdoc-bundle/blob/development/LICENSE>
 * @link     https://github.com/nvkode/nvdoc-bundle
 */
class TwigCompiler implements CompilerPassInterface
{

    /**
     * Define Nvdoc Twig namespace and load templates folder into project.
     *
     * @param ContainerBuilder $container Symfony container
     *
     * @return void
     */
    public function process(ContainerBuilder $container): void
    {
        $definition = 'twig.loader.native_filesystem';

        if ($container->hasDefinition($definition)) {
            $bundleDirectory = dirname(__DIR__, 2);
            $twigFilesystemLoaderDefinition = $container->getDefinition($definition);
            $twigFilesystemLoaderDefinition->addMethodCall(
                'addPath',
                [sprintf('%s/templates', $bundleDirectory), 'Nvdoc']
            );
        }
    }
}