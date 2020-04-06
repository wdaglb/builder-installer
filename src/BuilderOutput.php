<?php


namespace ke\composer;


use Composer\Composer;
use Composer\Installer\BinaryInstaller;
use Composer\Installer\LibraryInstaller;
use Composer\IO\IOInterface;
use Composer\Package\PackageInterface;
use Composer\Util\Filesystem;

class BuilderOutput extends LibraryInstaller
{
    public function __construct(IOInterface $io, Composer $composer, $type = 'library', Filesystem $filesystem = null, BinaryInstaller $binaryInstaller = null)
    {
        parent::__construct($io, $composer, $type, $filesystem, $binaryInstaller);
    }

    public function getInstallPath(PackageInterface $package)
    {
        $name = $package->getPrettyName();
        if (strpos($name, 'ke-builder-template/') === false) {
            return parent::getInstallPath($package);
        }
        $name = str_replace('ke-builder-template/', '', $name);

        return 'public/static/' . $name;
    }
}
