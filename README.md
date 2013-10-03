# CwsCrypto

CwsDebug is a PHP class to output additional messages for debug.

## Requirements and installation

* Download and copy the [CwsDump](https://github.com/crazy-max/CwsDump) PHP class.
* Copy the ``class.cws.debug.php`` file in a folder on your server.
* You can use the ``index.php`` file sample to help you.

## Getting started

```php
<?php

// Download CwsDump at https://github.com/crazy-max/CwsDump
require_once 'class.cws.dump.php';

require_once 'class.cws.debug.php';
$cwsDebug = new CwsDebug();
$cwsDebug->setVerbose(CWSDEBUG_VERBOSE_DEBUG); // CWSDEBUG_VERBOSE_QUIET, CWSDEBUG_VERBOSE_SIMPLE, CWSDEBUG_VERBOSE_REPORT or CWSDEBUG_VERBOSE_DEBUG

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

?>
```

## Example

An example is available in ``index.php`` file :

![](https://raw.github.com/crazy-max/CwsDebug/master/example.png)

## Methods

**simple** - Output a message.<br />
**error** - Output error message.<br />
**dump** - Output a variable dump.<br />
**labelValue** - Output a value associated to a label.<br />
**titleH1** - Output title H1.<br />
**titleH2** - Output title H2.<br />
**titleH3** - Output title H3.<br />

**setVerbose** - Control the debug output.<br />
**setMode** - The debug output mode.<br />
**getVersion** - Get the CwsCrypto version.<br />

## License

LGPL. See ``LICENSE`` for more details.
