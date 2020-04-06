<?php


namespace ke\composer;


use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Init implements PluginInterface
{
    /**
     * @inheritDoc
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        // var_dump($dir);
        $im = $composer->getInstallationManager();

        $im->addInstaller(new BuilderOutput($io, $composer));
    }
}
