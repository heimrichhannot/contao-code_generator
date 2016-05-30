<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'HeimrichHannot\CodeGenerator\ModuleCodeGenerator' => 'system/modules/code_generator/modules/ModuleCodeGenerator.php',

	// Models
	'HeimrichHannot\CodeGenerator\ConfigModel'         => 'system/modules/code_generator/models/ConfigModel.php',
));
