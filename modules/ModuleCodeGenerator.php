<?php

namespace HeimrichHannot\CodeGenerator;

use HeimrichHannot\Haste\Security\CodeGenerator;
use HeimrichHannot\Haste\Util\Files;
use HeimrichHannot\Haste\Util\StringUtil;

class ModuleCodeGenerator
{

	public static function generate()
	{
		if (($objConfig = ConfigModel::findByPk(\Input::get('id'))) !== null && $intCount = \Input::get('count'))
		{
			$arrAlphabets = deserialize($objConfig->alphabets, true);
			$arrRules = deserialize($objConfig->rules, true);
			$arrCodes = array();

			for ($i = 0; $i < $intCount; $i++)
			{
				$strCode = CodeGenerator::generate($objConfig->length, $objConfig->preventAmbiguous, $arrAlphabets,
					$arrRules, $objConfig->allowedSpecialChars);

				if ($objConfig->preventDoubleCodes)
				{
					$blnFound = false;

					if ($objConfig->doubleCodeTable && $objConfig->doubleCodeTableField)
					{
						$blnFound = static::findCodeInTable($strCode, $objConfig->doubleCodeTable, $objConfig->doubleCodeTableField);
					}

					while (in_array($strCode, $arrCodes) || $blnFound)
					{
						$strCode = CodeGenerator::generate($objConfig->length, $objConfig->preventAmbiguous, $arrAlphabets,
							$arrRules, $objConfig->allowedSpecialChars);

						$blnFound = false;

						if ($objConfig->doubleCodeTable && $objConfig->doubleCodeTableField)
						{
							$blnFound = static::findCodeInTable($strCode, $objConfig->doubleCodeTable, $objConfig->doubleCodeTableField);
						}
					}
				}

				$arrCodes[] = $strCode;
			}

			Files::sendTextAsFileToBrowser(implode("\n", $arrCodes), 'codes_' . date('Y-m-d-H-i') . '.txt');
		}
	}

	public static function findCodeInTable($strCode, $strTable, $strField)
	{
		return \Database::getInstance()->prepare("SELECT $strField FROM $strTable WHERE $strField=?")
			->execute($strCode)->numRows > 0;
	}

}