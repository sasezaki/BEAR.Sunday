<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Sunday\Module\Framework;

use BEAR\Sunday\Module;
use Ray\Di\AbstractModule;
use Ray\Di\Injector;
use Ray\Di\Module\InjectorModule;

/**
 * Application module
 */
class FrameworkModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new Module\Cache\CacheModule);
        $this->install(new Module\Code\CachedAnnotationModule);
        $this->install(new Module\Resource\ResourceModule($this));
    }
}
