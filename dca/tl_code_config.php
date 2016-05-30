<?php

use HeimrichHannot\Haste\Security\CodeGenerator;
use HeimrichHannot\CodeGenerator\ConfigModel;

$GLOBALS['TL_DCA']['tl_code_config'] = array
(
	'config'   => array
	(
		'dataContainer'     => 'Table',
		'enableVersioning'  => true,
		'onload_callback' => array
		(
			array('tl_code_config', 'modifyPalette')
		),
		'onsubmit_callback' => array
		(
			array('HeimrichHannot\Haste\Dca\General', 'setDateAdded'),
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),
	'list'     => array
	(
		'label' => array
		(
			'fields' => array('title'),
			'format' => '%s'
		),
		'sorting'           => array
		(
			'mode'                  => 2,
			'fields'                => array('title'),
			'headerFields'          => array('title'),
			'panelLayout'           => 'filter;search,limit'
		),
		'global_operations' => array
		(
			'all'    => array
			(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();"'
			),
		),
		'operations' => array
		(
			'edit'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_code_config']['edit'],
				'href'  => 'act=edit',
				'icon'  => 'edit.gif'
			),
			'copy'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_code_config']['copy'],
				'href'  => 'act=copy',
				'icon'  => 'copy.gif'
			),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_code_config']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_code_config']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
			),
			'generate' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_code_config']['generate'],
				'href'            => 'key=generate',
				'button_callback' => array('tl_code_config', 'getGenerateButton')
			)
		)
	),
	'palettes' => array(
		'__selector__' => array('preventDoubleCodes'),
		'default' => '{general_legend},title;{config_legend},length,preventAmbiguous,preventDoubleCodes,alphabets,rules,allowedSpecialChars;'
	),
	'subpalettes' => array(
		'preventDoubleCodes' => 'doubleCodeTable,doubleCodeTableField',
		'published'	=> 'start,stop'
	),
	'fields'   => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_code_config']['tstamp'],
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'dateAdded' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['dateAdded'],
			'sorting'                 => true,
			'flag'                    => 6,
			'eval'                    => array('rgxp'=>'datim', 'doNotCopy' => true),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_code_config']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('mandatory' => true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'preventAmbiguous' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_code_config']['preventAmbiguous'],
			'exclude'   => true,
			'inputType' => 'checkbox',
			'default'   => true,
			'eval'      => array('tl_class' => 'w50 clr'),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'length' => array
		(
			'label'				=> &$GLOBALS['TL_LANG']['tl_code_config']['length'],
			'exclude'			=> true,
			'inputType'			=> 'text',
			'default'			=> 8,
			'eval'				=> array('rgxp'=>'digit', 'tl_class'=>'w50'),
			'sql'               => "int(64) unsigned NOT NULL default '0'"
		),
		'preventDoubleCodes' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_code_config']['preventDoubleCodes'],
			'exclude'   => true,
			'inputType' => 'checkbox',
			'default'   => true,
			'eval'      => array('submitOnChange' => true, 'tl_class' => 'w50'),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'doubleCodeTable' => array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_code_config']['doubleCodeTable'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('HeimrichHannot\Haste\Dca\General', 'getDataContainers'),
			'eval'                    => array('chosen' => true, 'submitOnChange' => true, 'includeBlankOption' => true,
											   'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'doubleCodeTableField' => array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_code_config']['doubleCodeTableField'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_code_config', 'getFields'),
			'eval'                    => array('chosen' => true, 'mandatory' => true, 'includeBlankOption' => true,
											   'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'alphabets' => array
		(
			'label'				=> &$GLOBALS['TL_LANG']['tl_code_config']['alphabets'],
			'exclude'			=> true,
			'inputType'			=> 'checkbox',
			'options'			=> array(
				CodeGenerator::CAPITAL_LETTERS,
				CodeGenerator::SMALL_LETTERS,
				CodeGenerator::NUMBERS,
				CodeGenerator::SPECIAL_CHARS
			),
			'reference'			=> &$GLOBALS['TL_LANG']['tl_code_config']['alphabets'],
			'eval'				=> array('mandatory' => true, 'multiple'=>true, 'tl_class'=>'w50 clr', 'submitOnChange'=>true),
			'sql'				=> "blob NULL"
		),
		'rules' => array
		(
			'label'				=> &$GLOBALS['TL_LANG']['tl_code_config']['rules'],
			'exclude'			=> true,
			'inputType'			=> 'checkbox',
			'options_callback'	=> array('tl_code_config', 'getRulesAsOptions'),
			'reference'			=> &$GLOBALS['TL_LANG']['tl_code_config']['rules'],
			'eval'				=> array('multiple'=>true, 'tl_class'=>'w50'),
			'sql'				=> "blob NULL"
		),
		'allowedSpecialChars' => array
		(
			'label'				=> &$GLOBALS['TL_LANG']['tl_code_config']['allowedSpecialChars'],
			'exclude'			=> true,
			'inputType'			=> 'text',
			'default'			=> '[=<>()#/]',
			'eval'				=> array('tl_class'=>'w50 clr'),
			'sql'				=> "varchar(255) NOT NULL default ''"
		)
	)
);


class tl_code_config extends \Backend
{
	public function getRulesAsOptions(\DataContainer $objDc)
	{
		$arrRuleOptions = array();

		if (($objConfig = ConfigModel::findByPk($objDc->id)) !== null)
		{
			$arrAlphabets = deserialize($objConfig->alphabets, true);
			$arrTypes = array(
				CodeGenerator::CAPITAL_LETTERS,
				CodeGenerator::SMALL_LETTERS,
				CodeGenerator::NUMBERS,
				CodeGenerator::SPECIAL_CHARS
			);

			foreach ($arrTypes as $strType)
			{
				if (in_array($strType, $arrAlphabets))
				{
					$arrRuleOptions[] = $strType;
				}
			}
		}

		return $arrRuleOptions;
	}

	public function modifyPalette()
	{
		$objConfig = ConfigModel::findByPk(\Input::get('id'));
		$arrDca = &$GLOBALS['TL_DCA']['tl_code_config'];
		$arrAlphabets = deserialize($objConfig->alphabets, true);

		if (!in_array(CodeGenerator::SPECIAL_CHARS, $arrAlphabets))
		{
			$arrDca['palettes']['default'] = str_replace('allowedSpecialChars', '', $arrDca['palettes']['default']);
		}

		if (!$objConfig->doubleCodeTable)
		{
			$arrDca['subpalettes']['preventDoubleCodes'] = str_replace('doubleCodeTableField', '', $arrDca['subpalettes']['preventDoubleCodes']);
		}
	}

	public static function getGenerateButton($arrRow, $strKey, $strLabel, $strTitle)
	{
		$strHref = sprintf('contao/main.php?do=code_config&%s&id=%s&rt=%s', $strKey, $arrRow['id'], \RequestToken::get());

		return sprintf("<a href=\"%s\" title=\"%s\" onclick=\"count=prompt('%s', '');" .
			"if (count) {self.location.href='/%s&count=' + count;} return false;\"><img src=\"%s\"></a>",
			$strHref, $strTitle, $GLOBALS['TL_LANG']['MSC']['codeGenerator']['codesPrompt'], $strHref,
			'system/modules/code_generator/assets/img/generate.png');
	}

	public static function getFields(\DataContainer $objDc)
	{
		if ($objDc->activeRecord->doubleCodeTable)
			return \HeimrichHannot\Haste\Dca\General::getFields($objDc->activeRecord->doubleCodeTable, false);
	}
}
