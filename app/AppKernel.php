<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function init()
    {
        // Please read http://symfony.com/doc/2.0/book/installation.html#configuration-and-setup
        umask(0002);

        parent::init();
    }

    public function registerBundles()
    {
        $bundles = array(
            // SYMFONY STANDARD EDITION
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),

            // DOCTRINE
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\DoctrineMigrationsBundle\DoctrineMigrationsBundle(),

            // KNP HELPER BUNDLES
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),

            // USER
            new FOS\UserBundle\FOSUserBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),

            // PAGE
            new Sonata\PageBundle\SonataPageBundle(),
            new Application\Sonata\PageBundle\ApplicationSonataPageBundle(),

            // NEWS
            new Sonata\NewsBundle\SonataNewsBundle(),
            new Application\Sonata\NewsBundle\ApplicationSonataNewsBundle(),

            // MEDIA
            new Sonata\MediaBundle\SonataMediaBundle(),
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),
            // new Liip\ImagineBundle\LiipImagineBundle(),

            // SONATA CORE & HELPER BUNDLES
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\IntlBundle\SonataIntlBundle(),
            new Sonata\FormatterBundle\SonataFormatterBundle(),
            new Sonata\CacheBundle\SonataCacheBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new Sonata\NotificationBundle\SonataNotificationBundle(),

            // DEMO
            new Sonata\Bundle\DemoBundle\SonataDemoBundle(),

            // Enable this if you want to audit backend action
            new SimpleThings\EntityAudit\SimpleThingsEntityAuditBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Bazinga\Bundle\FakerBundle\BazingaFakerBundle();
            $bundles[] = new Symfony\Bundle\DoctrineFixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    /**
     * @param Symfony\Component\Config\Loader\LoaderInterface $loader
     * @return void
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
