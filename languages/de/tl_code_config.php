<?php

use HeimrichHannot\Haste\Security\CodeGenerator;

$arrLang = &$GLOBALS['TL_LANG']['tl_code_config'];

/**
 * Fields
 */
$arrLang['title'] = array('Titel', 'Geben Sie hier bitte den Titel ein.');
$arrLang['tstamp'] = array('Änderungsdatum', '');
$arrLang['length'] = array('Codelänge', 'Bitte geben Sie hier die Code-Länge ein.');
$arrLang['preventAmbiguous'] = array('Mehrdeutige Zeichen verhindern', 'Wählen Sie diese Option, um mehrdeutige Zeichen zu verhindern (enthalten sind u.a. y, z, o, i und l sowie deren große Varianten).');
$arrLang['preventDoubleCodes'] = array('Doppelte Codes verhindern', 'Wählen Sie diese Option, um doppelt auftretende Codes zu verhindern.');
$arrLang['doubleCodeTable'] = array('Doppelte Codes anhand einer Datenbanktabelle finden', 'Wählen Sie hier eine Datenbanktabelle aus, müssen Sie anschließend ein Feld dieser Tabelle wählen. Beim Erzeugen der Codes wird darauf geachtet, dass der erzeugte Code noch in keinem Datenbankeintrag vorkommt.');
$arrLang['doubleCodeTableField'] = array('Datenbankfeld', 'Wählen Sie hier das Datenbankfeld aus, in dem nach potentiellen Code-Duplikaten gesucht werden soll.');

$arrLang['alphabets'] = array('Alphabete', 'Bitte wählen Sie die Alphabete aus, die als Grundlage dienen sollen.');
$arrLang['alphabets'][CodeGenerator::CAPITAL_LETTERS] = 'Großbuchstaben';
$arrLang['alphabets'][CodeGenerator::SMALL_LETTERS] = 'Kleinbuchstaben';
$arrLang['alphabets'][CodeGenerator::NUMBERS] = 'Zahlen';
$arrLang['alphabets'][CodeGenerator::SPECIAL_CHARS] = 'Sonderzeichen';

$arrLang['rules'] = array('Regeln', 'Bitte geben Sie die Regeln an, die für die Codes gelten sollen. WICHTIG: Für eine solche Bedingung muss das entsprechende Alphabet aktiv sein.');
$arrLang['rules'][CodeGenerator::CAPITAL_LETTERS] = 'Mindestens einen Grossbuchstaben';
$arrLang['rules'][CodeGenerator::SMALL_LETTERS] = 'Mindestens einen Kleinbuchstaben';
$arrLang['rules'][CodeGenerator::NUMBERS] = 'Mindestens eine Zahl';
$arrLang['rules'][CodeGenerator::SPECIAL_CHARS] = 'Mindestens ein Sonderzeichen';

$arrLang['allowedSpecialChars'] = array('Erlaubte Sonderzeichen', 'Bitte geben Sie eine kommagetrennte Liste der erlaubten Sonderzeichen ein.');

/**
 * References
 */
$arrLang['oldValue'] = 'Alter Wert';
$arrLang['newValue'] = 'Neuer Wert';

/**
 * Legends
 */
$arrLang['general_legend'] = 'Allgemeine Einstellungen';
$arrLang['config_legend'] = 'Konfiguration';

/**
 * Buttons
 */
$arrLang['new'] = array('Neue Code-Konfiguration', 'Code-Konfiguration erstellen');
$arrLang['edit'] = array('Code-Konfiguration bearbeiten', 'Code-Konfiguration ID %s bearbeiten');
$arrLang['copy'] = array('Code-Konfiguration duplizieren', 'Code-Konfiguration ID %s duplizieren');
$arrLang['delete'] = array('Code-Konfiguration löschen', 'Code-Konfiguration ID %s löschen');
$arrLang['show'] = array('Code-Konfiguration Details', 'Code-Konfiguration-Details ID %s anzeigen');
$arrLang['generate'] = array('Codes generieren', 'Codes der Konfiguration ID %s generieren');
