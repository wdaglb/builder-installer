<?php


namespace ke\composer;


use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\LibraryInstaller;
use Composer\IO\IOInterface;
use Composer\Package\PackageInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\PreFileDownloadEvent;
use Composer\Repository\InstalledRepositoryInterface;

class BuilderTemplate implements PluginInterface, EventSubscriberInterface
{
    protected $composer;
    protected $io;

//    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
//    {
//        parent::install($repo, $package);
//
//
//    }

    public function onPreFileDownload(PreFileDownloadEvent $event)
    {
        $protocol = parse_url($event->getProcessedUrl(), PHP_URL_SCHEME);

        if ($protocol === 's3') {
            // $event->setRemoteFilesystem($s3RemoteFilesystem);
        }
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return array(
            PluginEvents::PRE_FILE_DOWNLOAD => array(
                array('onPreFileDownload', 0)
            ),
        );
    }

    /**
     * @inheritDoc
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;

        $dir = $composer->getPackage()->getType();
        var_dump($dir);
        // $im = $composer->getInstallationManager();

        //$im->addInstaller(new BuilderOutput($io, $composer));
    }
}
