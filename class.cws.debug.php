<?php

/**
 * CwsDebug
 *
 * CwsDebug is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or (at your option)
 * or (at your option) any later version.
 *
 * CwsDebug is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser General Public License
 * for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see http://www.gnu.org/licenses/.
 * 
 * @package CwsDebug
 * @author Cr@zy
 * @copyright 2013, Cr@zy
 * @license GNU LESSER GENERAL PUBLIC LICENSE
 * @version 1.3
 *
 */

define('CWSDEBUG_VERBOSE_QUIET', 0); // no output at all.
define('CWSDEBUG_VERBOSE_SIMPLE', 1); // only output simple report.
define('CWSDEBUG_VERBOSE_REPORT', 2); // output a detail report.
define('CWSDEBUG_VERBOSE_DEBUG', 3); // output detail report as well as debug info.

define('CWSDEBUG_MODE_ECHO', 0); // output echo
define('CWSDEBUG_MODE_FILE', 1); // output file

define('CWSDEBUG_FONT_FAMILY', 'Monospace');

class CwsDebug
{
    /**
     * Control the debug output.
     * default CWSDEBUG_VERBOSE_QUIET
     * @var int
     */
    private $_verbose = CWSDEBUG_VERBOSE_QUIET;
    
    /**
     * The debug output mode.
     * default CWSDEBUG_MODE_ECHO
     * @var int
     */
    private $_mode = CWSDEBUG_MODE_ECHO;
    
    /**
     * The debug file path in CWSDEBUG_MODE_FILE mode.
     * default './cwsdebug.html'
     * @var string
     */
    private $_filePath = './cwsdebug.html';
    
    public function __construct()
    {
        if (!class_exists('CwsDump')) {
            $this->error('CwsDump is required - https://github.com/crazy-max/CwsDump', CWSDEBUG_VERBOSE_QUIET);
            exit();
        }
    }
    
    /**
     * Output a message.
     * @param string $msg - the message.
     * @param int $verboseLvl - the output level.
     * @param boolean $insertNewline - insert new line or not.
     * @param boolean|object $dump - the variable to dump or false.
     * @param boolean|string $error - the error message or false.
     */
    public function simple($msg, $verboseLvl=null, $insertNewline=true, $dump=false, $error=false)
    {
        $verboseLvl = $verboseLvl == null ? CWSDEBUG_VERBOSE_SIMPLE : $verboseLvl;
        if ($this->_mode == CWSDEBUG_MODE_ECHO) {
            $this->modeEcho($msg, $verboseLvl, $insertNewline, $dump, $error);
        } elseif (!empty($this->_filePath)) {
            $this->modeFile($msg, $verboseLvl, $insertNewline, $dump, $error);
        }
    }
    
    /**
     * Output an error message.
     * @param string $error - the last error msg.
     * @param int $verboseLvl - the output level.
     * @param boolean $insertNewline - insert new line or not.
     */
    public function error($error, $verboseLvl=null, $insertNewline=true)
    {
        $this->simple(null, $verboseLvl, $insertNewline, false, $error);
    }
    
    /**
     * Output a variable dump.
     * @param string $title - the title associated to the variable.
     * @param object $var - the var to dump.
     * @param int $verboseLvl - the output level.
     */
    public function dump($title, $var, $verboseLvl=null)
    {
        $this->simple($title, $verboseLvl, false, $var);
    }
    
    /**
     * Output a value associated to a label.
     * @param string $label - the label.
     * @param string $value - the value.
     * @param int $verboseLvl - the output level.
     * @param boolean $insertNewline : insert new line or not.
     */
    public function labelValue($label, $value, $verboseLvl=null, $insertNewline=true)
    {
        $this->simple('<strong>' . $label . ' :</strong> ' . $value, $verboseLvl, $insertNewline);
    }
    
    /**
     * Output title H1.
     * @param string $title - the title.
     * @param int $verboseLvl - the output level.
     */
    public function titleH1($title, $verboseLvl=null)
    {
        $this->title($title, 'h1', $verboseLvl);
    }
    
    /**
     * Output title H2.
     * @param string $title - the title.
     * @param int $verboseLvl - the output level.
     */
    public function titleH2($title, $verboseLvl=null)
    {
        $this->title($title, 'h2', $verboseLvl);
    }
    
    /**
     * Output title H3.
     * @param string $title - the title.
     * @param int $verboseLvl - the output level.
     */
    public function titleH3($title, $verboseLvl=null)
    {
        $this->title($title, 'h3', $verboseLvl);
    }
    
    /**
     * Output a title.
     * @param string $title - the title.
     * @param string $type - the type of the title (h1, h2, h3).
     * @param int $verboseLvl - the output level.
     */
    private function title($title, $type, $verboseLvl=null)
    {
        $this->simple('<' . $type . '>' . $title . '</' . $type . '>', $verboseLvl, false);
    }
    
    /**
     * Output a new line.
     * @param int $verboseLvl - the output level.
     */
    public function newLine($verboseLvl=null)
    {
        $this->simple(null, $verboseLvl);
    }
    
    /**
     * Output a message in stdout.
     * @param string|array $msg : the output message.
     * @param int $verboseLvl : the output level of this message.
     * @param boolean $newline : insert new line or not.
     * @param boolean $code : is code or not.
     */
    private function modeEcho($msg, $verboseLvl, $insertNewline, $dump, $error)
    {
        if ($this->_verbose >= $verboseLvl) {
            if ($dump !== false) {
                echo '<fieldset style="margin-top:10pt;font-family:' .CWSDEBUG_FONT_FAMILY . ';">'
                    . '<legend style="font-weight:bold;">' . $msg . '</legend>' . cwsDump($dump, false) . '</fieldset>';
            } elseif ($error !== false) {
                echo '<span style="font-family:' .CWSDEBUG_FONT_FAMILY . ';color:#CC0000">ERROR: ' . $error . '</span>';
            } elseif (!empty($msg)) {
                echo '<span style="font-family:' .CWSDEBUG_FONT_FAMILY . ';">' . $msg . '</span>';
            }
            if ($insertNewline) {
                echo "<br />\n";
            }
        }
    }
    
    /**
     * Output additional msg for debug in file.
     * @param string $msg : if not given, output the last error msg.
     * @param int $verbose_level : the output level of this message.
     * @param boolean $newline : insert new line or not.
     * @param boolean $code : is code or not.
     */
    private function modeFile($msg, $verboseLvl, $insertNewline, $dump, $error)
    {
        $handle = @fopen($this->_filePath, 'a+');
        if ($this->_verbose >= $verboseLvl) {
            if ($dump !== false) {
                fwrite($handle, '<fieldset style="margin-top:10pt;font-family:' .CWSDEBUG_FONT_FAMILY . ';"><legend style="font-weight:bold;">' . $msg . '</legend>' . cwsDump($dump, false) . '</fieldset>');
            } elseif ($error !== false) {
                fwrite($handle, '<span style="font-family:' .CWSDEBUG_FONT_FAMILY . ';color:#CC0000">ERROR: ' . $error . '</span>');
            } elseif (!empty($msg)) {
                fwrite($handle, '<span style="font-family:' .CWSDEBUG_FONT_FAMILY . ';">' . $msg . '</span>');
            }
            if ($insertNewline) {
                fwrite($handle, "<br />\n");
            }
        }
        fclose($handle);
    }
    
    /**
     * Getters and setters
     */
    
    /**
     * Set the debug verbose.
     * @param int $verbose
     */
    public function setVerbose($verbose)
    {
        if (!empty($verbose)) {
            $this->_verbose = $verbose;
        }
    }

    /**
     * Set the debug mode.
     * @param int $mode - CWSDEBUG_MODE_ECHO ou CWSDEBUG_MODE_FILE
     * @param string $filePath - The debug file path for CWSDEBUG_MODE_FILE.
     * @param boolean $fileClear - Clear the debug file at the beginning. 
     */
    public function setMode($mode, $filePath=null, $fileClear=false)
    {
        if (!empty($mode)) {
            $this->_mode = $mode;
        }
        if ($this->_mode == CWSDEBUG_MODE_FILE && empty($filePath)) {
            $this->_mode = CWSDEBUG_MODE_ECHO;
            $this->error('You have to set the file path for debugging in file mode...', CWSDEBUG_VERBOSE_QUIET);
            exit();
        } elseif (!empty($filePath)) {
            $this->_filePath = $filePath;
            if ($fileClear && file_exists($this->_filePath)) {
                @unlink($this->_filePath);
            }
        }
    }
}
