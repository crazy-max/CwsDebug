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
 * @copyright 2013-2015, Cr@zy
 * @license GNU LESSER GENERAL PUBLIC LICENSE
 * @version 1.5
 *
 */

class CwsDebug
{
    const VERBOSE_QUIET = 0; // no output at all.
    const VERBOSE_SIMPLE = 1; // only output simple report.
    const VERBOSE_REPORT = 2; // output a detail report.
    const VERBOSE_DEBUG = 3; // output detail report as well as debug info.
    
    const MODE_ECHO = 0; // output echo
    const MODE_FILE = 1; // output file
    
    const FONT_FAMILY = 'Monospace';
    
    /**
     * Control the debug output.
     * default VERBOSE_QUIET
     * @var int
     */
    private $verbose;
    
    /**
     * The debug output mode.
     * default MODE_ECHO
     * @var int
     */
    private $mode;
    
    /**
     * The debug file path in MODE_FILE mode.
     * default './cwsdebug.html'
     * @var string
     */
    private $filePath;
    
    /**
     * The cws dump instance.
     * @var CwsDump
     */
    private $cwsDump;
    
    public function __construct(CwsDump $cwsDump)
    {
        $this->verbose = self::VERBOSE_QUIET;
        $this->mode = self::MODE_ECHO;
        $this->cwsDump = $cwsDump;
    }
    
    /**
     * Output a message.
     * @param string $msg - the message.
     * @param int $verboseLvl - the output level.
     * @param boolean $insertNewline - insert new line or not.
     * @param boolean|object $dump - the variable to dump or false.
     * @param boolean|string $error - the error message or false.
     */
    public function simple($msg, $verboseLvl = null, $insertNewline = true, $dump = false, $error = false)
    {
        $verboseLvl = $verboseLvl == null ? self::VERBOSE_SIMPLE : $verboseLvl;
        if ($this->mode == self::MODE_ECHO) {
            $this->modeEcho($msg, $verboseLvl, $insertNewline, $dump, $error);
        } elseif (!empty($this->filePath)) {
            $this->modeFile($msg, $verboseLvl, $insertNewline, $dump, $error);
        }
    }
    
    /**
     * Output an error message.
     * @param string $error - the last error msg.
     * @param int $verboseLvl - the output level.
     * @param boolean $insertNewline - insert new line or not.
     */
    public function error($error, $verboseLvl = null, $insertNewline = true)
    {
        $this->simple(null, $verboseLvl, $insertNewline, false, $error);
    }
    
    /**
     * Output a variable dump.
     * @param string $title - the title associated to the variable.
     * @param object $var - the var to dump.
     * @param int $verboseLvl - the output level.
     */
    public function dump($title, $var, $verboseLvl = null)
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
    public function labelValue($label, $value, $verboseLvl = null, $insertNewline = true)
    {
        $this->simple('<strong>' . $label . ' :</strong> ' . $value, $verboseLvl, $insertNewline);
    }
    
    /**
     * Output title H1.
     * @param string $title - the title.
     * @param int $verboseLvl - the output level.
     */
    public function titleH1($title, $verboseLvl = null)
    {
        $this->title($title, 'h1', $verboseLvl);
    }
    
    /**
     * Output title H2.
     * @param string $title - the title.
     * @param int $verboseLvl - the output level.
     */
    public function titleH2($title, $verboseLvl = null)
    {
        $this->title($title, 'h2', $verboseLvl);
    }
    
    /**
     * Output title H3.
     * @param string $title - the title.
     * @param int $verboseLvl - the output level.
     */
    public function titleH3($title, $verboseLvl = null)
    {
        $this->title($title, 'h3', $verboseLvl);
    }
    
    /**
     * Output a title.
     * @param string $title - the title.
     * @param string $type - the type of the title (h1, h2, h3).
     * @param int $verboseLvl - the output level.
     */
    private function title($title, $type, $verboseLvl = null)
    {
        $this->simple('<' . $type . '>' . $title . '</' . $type . '>', $verboseLvl, false);
    }
    
    /**
     * Output a new line.
     * @param int $verboseLvl - the output level.
     */
    public function newLine($verboseLvl = null)
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
        if ($this->verbose >= $verboseLvl) {
            if ($dump !== false) {
                echo '<fieldset style="margin-top:10pt;font-family:' .self::FONT_FAMILY . ';">'
                    . '<legend style="font-weight:bold;">' . $msg . '</legend>' . $this->cwsDump->dump($dump, false) . '</fieldset>';
            } elseif ($error !== false) {
                echo '<span style="font-family:' .self::FONT_FAMILY . ';color:#CC0000">ERROR: ' . $error . '</span>';
            } elseif (!empty($msg)) {
                echo '<span style="font-family:' .self::FONT_FAMILY . ';">' . $msg . '</span>';
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
        $handle = @fopen($this->filePath, 'a+');
        if ($this->verbose >= $verboseLvl) {
            if ($dump !== false) {
                fwrite($handle, '<fieldset style="margin-top:10pt;font-family:' .self::FONT_FAMILY . ';"><legend style="font-weight:bold;">' . $msg . '</legend>' . $this->cwsDump->dump($dump, false) . '</fieldset>');
            } elseif ($error !== false) {
                fwrite($handle, '<span style="font-family:' .self::FONT_FAMILY . ';color:#CC0000">ERROR: ' . $error . '</span>');
            } elseif (!empty($msg)) {
                fwrite($handle, '<span style="font-family:' .self::FONT_FAMILY . ';">' . $msg . '</span>');
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
     * Check if verbose is quiet.
     * @return boolean
     */
    public function isQuietVerbose()
    {
        return $this->verbose == self::VERBOSE_QUIET;
    }
    
    /**
     * Set the verbose to quiet.
     */
    public function setQuietVerbose()
    {
        $this->setVerbose(self::VERBOSE_QUIET);
    }
    
    /**
     * Check if verbose is simple.
     * @return boolean
     */
    public function isSimpleVerbose()
    {
        return $this->verbose == self::VERBOSE_SIMPLE;
    }
    
    /**
     * Set the verbose to simple.
     */
    public function setSimpleVerbose()
    {
        $this->setVerbose(self::VERBOSE_SIMPLE);
    }
    
    /**
     * Check if verbose is report.
     * @return boolean
     */
    public function isReportVerbose()
    {
        return $this->verbose == self::VERBOSE_REPORT;
    }
    
    /**
     * Set the verbose to report.
     */
    public function setReportVerbose()
    {
        $this->setVerbose(self::VERBOSE_REPORT);
    }
    
    /**
     * Check if verbose is debug.
     * @return boolean
     */
    public function isDebugVerbose()
    {
        return $this->verbose == self::VERBOSE_DEBUG;
    }
    
    /**
     * Set the verbose to debug.
     */
    public function setDebugVerbose()
    {
        $this->setVerbose(self::VERBOSE_DEBUG);
    }
    
    /**
     * Set the verbose.
     * @param int $verbose
     */
    private function setVerbose($verbose)
    {
        $this->verbose = $verbose;
    }
    
    /**
     * Set the mode to echo.
     */
    public function setEchoMode()
    {
        $this->setMode(self::MODE_ECHO);
    }
    
    /**
     * Set the mode to file.
     * @param string $filePath - The file path - default './cwsdebug.html'.
     * @param boolean $fileClear - Clear the file at the beginning.
     */
    public function setFileMode($filePath = './cwsdebug.html', $fileClear = false)
    {
        if (empty($filePath)) {
            $this->error('You have to set the file path for debugging in file mode...', self::VERBOSE_QUIET);
            exit();
        }
        
        $this->filePath = $filePath;
        if (!file_exists($this->filePath)) {
            touch($this->filePath);
        }
        if ($fileClear) {
            unlink($this->filePath);
            touch($this->filePath);
        }
        
        $this->setMode(self::MODE_FILE);
    }

    /**
     * Set the mode.
     * @param int $mode
     */
    private function setMode($mode)
    {
        $this->mode = $mode;
    }
}
