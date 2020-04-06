<?php


namespace ke\composer;


use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class BuilderOutput extends LibraryInstaller
{
    public function getInstallPath(PackageInterface $package)
    {
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
