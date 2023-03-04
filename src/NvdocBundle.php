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

namespace Nvkode\NvdocBundle;

use Nvkode\NvdocBundle\Compiler\TwigCompiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * NvdocBundle Class
 *
 * @category Base
 * @package  NvdocBundle
 * @author   Mykyta Melnyk <liswelus@gmail.com>
 * @license  MIT <https://github.com/nvkode/nvdoc-bundle/blob/development/LICENSE>
 * @link     https://github.com/nvkode/nvdoc-bundle
 */
class NvdocBundle extends Bundle
{

    /**
     * Include all compilers into project.
     *
     * @param ContainerBuilder $container Symfony container
     *
     * @return void
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new TwigCompiler());
    }

}
