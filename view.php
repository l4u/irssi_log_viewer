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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Irssi Log Viewer</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="style.prod.css" media="screen" />
    </head>
    <body>
        <h1>Irssi Log Viewer</h1>
        <div class="error"><?php echo $error->getError(); ?></div>

        <div id="log-view"><div class="warning"><?php echo $error->getWarning(); ?></div>
            <?php echo $log_file; ?>
        </div>
        <div id="server-list">
            <ul>
                <?php foreach($irc_log_tree as $ircServer): ?>
                <li class="li-server"><?php echo $ircServer->getName(); ?>
                        <?php $channelList = $ircServer->getChannels(); ?>
                        <?php if(count($channelList)>0) :?><ul>
                                <?php foreach($channelList as $channel): ?>
                                    <?php echo $channel->getHTML(); ?>
                                <?php endforeach; ?></ul>
                        <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="footer">
            Copyright 2010 Demian Gemperli, released under GPLv3
        </div>
    </body>
</html>