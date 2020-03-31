<?php


namespace ke\composer;


use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;

class BuilderFramework extends LibraryInstaller
{
//    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
//    {
//        parent::install($repo, $package);
//
//
//    }

    public function getInstallPath(PackageInterface $package)
    {
        if ($package->getPrettyName() !== 'ke/builder') {
            throw new \InvalidArgumentException('Enable to install this library!');
        }
        if ($this->composer->getPackage()) {
            $extra = $this->composer->getPackage()->getExtra();
            if (!empty($extra['ke-builder-path'])) {
                return $extra['ke-builder-path'];
            }
        }
        return 'kbuilder';
    }

}
