<?php

/**
* Backend modules
*/
$GLOBALS['BE_MOD']['devtools']['code_config'] = array(
	'tables' => array('tl_code_config'),
	'icon'   => 'system/modules/code_generator/assets/img/icon.png',
	'generate' => array('HeimrichHannot\CodeGenerator\ModuleCodeGenerator', 'generate'),
);

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_code_config'] = 'HeimrichHannot\CodeGenerator\ConfigModel';