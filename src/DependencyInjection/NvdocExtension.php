<?php

namespace Nvkode\NvdocBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class NvdocExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $yamlLoader = new YamlFileLoader($container, new FileLocator(dirname(dirname(__DIR__)) . '/config'));
        $yamlLoader->load('services.yaml');
    }
}