<?php

namespace blackknight467\AYAHBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AYAHExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('ayahPublisherKey', $config['publisher_key']);
        $container->setParameter('ayahScoringKey', $config['scoring_key']);
        $container->setParameter('ayahErrorMessage', $config['error_message']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $resources = $container->getParameter('twig.form.resources');
        $resources = array_merge(array('AYAHBundle::ayah.html.twig'), $resources);
        $container->setParameter('twig.form.resources', $resources);
    }
}
