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

namespace Nvkode\NvdocBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * NvdocExtension Class
 *
 * @category Extension
 * @package  NvdocBundle
 * @author   Mykyta Melnyk <liswelus@gmail.com>
 * @license  MIT <https://github.com/nvkode/nvdoc-bundle/blob/development/LICENSE>
 * @link     https://github.com/nvkode/nvdoc-bundle
 */
class NvdocExtension extends Extension
{

    /**
     * Load services.yaml configuration into Symfony project.
     *
     * @param array            $configs   All configs
     * @param ContainerBuilder $container Symfony container
     *
     * @return void
     *
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $yamlLoader = new YamlFileLoader(
            $container,
            new FileLocator(sprintf('%s/config', dirname(__DIR__, 2)))
        );
        $yamlLoader->load('services.yaml');

    }

}
