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
        var_dump($package->getType());
        if ($package->getType() !== 'ke-builder-template') {
            return parent::getInstallPath($package);
        }
        $name = $package->getName();
        if (strpos($name, '/')) {
            $name = str_replace('ke-builder-template/', '', $name);
        }

        return 'public/static/' . $name;
    }
}
