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
 * Description of IrcChannel
 *
 * @author Demian Gemperli <demian at gemperli.org>
 */
class IrcChannel {
    private $name;
    private $server;

    public function __construct($name,$server) {
        $this->server = $server;
        $this->name = $name;
    }

    public function getName() {return $this->name;}
    public function getHTML() {
        return "<li class=\"li-channel\"><a href=\"?s="
        .$this->server->getName()
        ."&amp;c="
        .$this->name
        ."\">#".$this->name."</a></li>";
    }
    public function getPath() {
        return IRSSI_LOG_PATH."/".$this->server->getName()."/#".$this->name.".log";
    }
}
?>
