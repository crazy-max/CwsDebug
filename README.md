# CwsDebug

CwsDebug is a PHP class to output additional messages for debug.

## Requirements and installation

* Download [CwsDump](https://github.com/crazy-max/CwsDump).
* Copy the ``class.cws.debug.php`` file in a folder on your server.

## Getting started

See ``example.php`` file sample to help you.

## Example

![](https://raw.github.com/crazy-max/CwsDebug/master/example.png)

## Methods

**simple** - Output a message.<br />
**error** - Output error message.<br />
**dump** - Output a variable dump.<br />
**labelValue** - Output a value associated to a label.<br />
**titleH1** - Output title H1.<br />
**titleH2** - Output title H2.<br />
**titleH3** - Output title H3.<br />

**setQuietVerbose** - Quiet verbose output : no output at all (default)<br />
**setSimpleVerbose** - Simple verbose output : only output simple report<br />
**setReportVerbose** - Report verbose output : output a detail report<br />
**setDebugVerbose** - Debug verbose output : output detail report as well as debug info<br />
**setEchoMode** - Echo output mode (default)<br />
**setFileMode** - File output mode<br />

## License

LGPL. See ``LICENSE`` for more details.
