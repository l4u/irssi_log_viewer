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

// Load configuration: IRSSI Log Path
require_once "config.php";
//Initialize Class Autoloader
require_once "autoloader.inc.php";

//Initialize ErrorHandler
$error = new ErrorHandler();
// Reads dir tree of irc logs
$irc_log_tree = IrssiLogViewer::getLogTree();
// Read log file
$log_file = IrssiLogViewer::getLogFile();
//Load View HTML
require_once "view.php";
?>
