<?php

// Download CwsDump at https://github.com/crazy-max/CwsDump
require_once 'class.cws.dump.php';

require_once 'class.cws.debug.php';
$cwsDebug = new CwsDebug();
// CWSDEBUG_VERBOSE_QUIET, CWSDEBUG_VERBOSE_SIMPLE, CWSDEBUG_VERBOSE_REPORT or CWSDEBUG_VERBOSE_DEBUG
$cwsDebug->setVerbose(CWSDEBUG_VERBOSE_DEBUG);

// ECHO mode
$cwsDebug->setMode(CWSDEBUG_MODE_ECHO);

// FILE mode
//$cwsDebug->setMode(CWSDEBUG_MODE_FILE, './cwsdebug.html'); // Default file path : './cwsdebug.html'

$cwsDebug->simple('Simple output');
$cwsDebug->error('Error output');
$cwsDebug->dump('Dump output', array('aString', 10, 1.5, true, new DateTime()));
$cwsDebug->labelValue('Label output', 'Value');
$cwsDebug->titleH1('H1 Title output');
$cwsDebug->titleH2('H2 Title output');
$cwsDebug->titleH3('H3 Title output');

