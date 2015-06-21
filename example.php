<?php

// Download CwsDump at https://github.com/crazy-max/CwsDump
require_once '../CwsDump/class.cws.dump.php';
$cwsDump = new CwsDump();

require_once 'class.cws.debug.php';
$cwsDebug = new CwsDebug($cwsDump);

// verbose
//$cwsDebug->setQuietVerbose(); // default
//$cwsDebug->setSimpleVerbose();
//$cwsDebug->setReportVerbose();
$cwsDebug->setDebugVerbose();

// mode
$cwsDebug->setEchoMode(); // default
//$cwsDebug->setFileMode('./cwsdebug.html');

$cwsDebug->simple('Simple output');
$cwsDebug->error('Error output');
$cwsDebug->dump('Dump output', array('aString', 10, 1.5, true, new DateTime()));
$cwsDebug->labelValue('Label output', 'Value');
$cwsDebug->titleH1('H1 Title output');
$cwsDebug->titleH2('H2 Title output');
$cwsDebug->titleH3('H3 Title output');
