<?php

require_once __DIR__.'/../vendor/autoload.php';
use Cws\CwsDebug;

$cwsDebug = new CwsDebug();

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
$cwsDebug->dump('Dump output', ['aString', 10, 1.5, true, new DateTime()]);
$cwsDebug->labelValue('Label output', 'Value');
$cwsDebug->titleH1('H1 Title output');
$cwsDebug->titleH2('H2 Title output');
$cwsDebug->titleH3('H3 Title output');
