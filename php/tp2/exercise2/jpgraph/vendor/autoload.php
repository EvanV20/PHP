<?php

/**
 * Autoloader minimal pour la bibliotheque amenadiel/jpgraph.
 *
 * Ce projet n'utilise pas Composer pour installer jpgraph (le dossier
 * exercise2/jpgraph contient directement le code source de la
 * bibliotheque). Ce fichier reproduit le mapping PSR-4 declare dans
 * jpgraph/composer.json afin que les classes du namespace
 * "Amenadiel\JpGraph\..." soient chargees automatiquement, exactement
 * comme le ferait "composer install".
 */

spl_autoload_register(function (string $class): void {
    // Prefixes tries du plus specifique au plus general.
    $prefixes = [
        'Amenadiel\\JpGraph\\Graph\\Scale\\' => __DIR__ . '/../src/graph/scale/',
        'Amenadiel\\JpGraph\\Graph\\Tick\\'  => __DIR__ . '/../src/graph/tick/',
        'Amenadiel\\JpGraph\\Graph\\Axis\\'  => __DIR__ . '/../src/graph/axis/',
        'Amenadiel\\JpGraph\\Graph\\'        => __DIR__ . '/../src/graph/',
        'Amenadiel\\JpGraph\\Image\\'        => __DIR__ . '/../src/image/',
        'Amenadiel\\JpGraph\\Plot\\'         => __DIR__ . '/../src/plot/',
        'Amenadiel\\JpGraph\\Text\\'         => __DIR__ . '/../src/text/',
        'Amenadiel\\JpGraph\\Themes\\'       => __DIR__ . '/../src/themes/',
        'Amenadiel\\JpGraph\\Util\\'         => __DIR__ . '/../src/util/',
        'Amenadiel\\JpGraph\\'               => __DIR__ . '/../src/',
    ];

    foreach ($prefixes as $prefix => $baseDir) {
        if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
            continue;
        }

        $relative = substr($class, strlen($prefix));
        $file     = $baseDir . str_replace('\\', '/', $relative) . '.php';

        if (is_file($file)) {
            require $file;
        }

        return;
    }
});
