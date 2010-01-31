<?php
/* 
 *  Copyright (C) 2010 Demian Gemperli <demian at gemperli.org>
 * 
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 * 
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 * 
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Doing some controller like actions
 *
 * @author Demian Gemperli <demian at gemperli.org>
 */
class IrssiLogViewer {
    private static $channelRegex = "=#(.*)\.log$=is";
    
    public static function getLogTree() {
        global $error;
        $serverList = array();

        $irssi_log_dir = scandir(IRSSI_LOG_PATH);
        if(!$irssi_log_dir) {
            $error->setError("Get Log Directory ".IRSSI_LOG_PATH." faild!");
            return;
        }

        foreach ($irssi_log_dir as $directory_item) {
            $dir_item_path = IRSSI_LOG_PATH.DIRECTORY_SEPARATOR.$directory_item;
            if(is_dir($dir_item_path)
                    && trim($directory_item,".")!=='') {
                $ircServer = new IrcServer($directory_item);

                $server_dir = scandir($dir_item_path);
                if(!$server_dir) {
                    $error->setError("Get Server Directory ".$dir_item_path." faild!");
                    return;
                }
                foreach($server_dir as $server_dir_item) {
                    $file_path = IRSSI_LOG_PATH.DIRECTORY_SEPARATOR.$ircServer->getName()."/".$server_dir_item;
                    if(!is_dir($file_path)
                            && preg_match(self::$channelRegex, $server_dir_item, $subpattern)) {
                        $ircServer->addChannel(new IrcChannel($subpattern[1],$ircServer));
                    }
                }
                array_push($serverList,$ircServer);
            }
        }

        return $serverList;
    }
    public static function getLogFile() {
        global $error;

        if(isset($_GET['s'])&&isset($_GET['c'])) {
            $logFile = new IrcChannel($_GET['c'], new IrcServer($_GET['s']));
            $logFilePath = $logFile->getPath();
            if(file_exists($logFilePath) && !is_dir($logFilePath)) {
                $logFileContents = file($logFilePath);
                
                $logFileHtml="";
                foreach($logFileContents as $line) {
                    $logFileHtml.=htmlspecialchars($line)."<br />\n";
                }
                return $logFileHtml;
            } else {
                $error->setError("File don't exists: ".$logFilePath);
            }
        } else {
            $error->setWarning("No log file selected!");
        }
    }
}
?>
