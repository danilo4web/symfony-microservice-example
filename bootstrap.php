<?php declare(strict_types=1);

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$isDebug = filter_var(getenv('DEBUG'), FILTER_VALIDATE_BOOLEAN);
$file = __DIR__ . '/cache/container.php';
$containerConfigCache = new ConfigCache($file, $isDebug);

// If we are in debug mode, always regenerate & dump the container file
if (!$containerConfigCache->isFresh()) {
    $containerBuilder = new ContainerBuilder();
    $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__ . '/config'));
    $loader->load('services.yml');
    $containerBuilder->compile(true);

    $dumper = new PhpDumper($containerBuilder);
    $containerConfigCache->write(
        $dumper->dump(['class' => 'CachedContainer']),
        $containerBuilder->getResources()
    );
}

require_once $file;
return new CachedContainer();
