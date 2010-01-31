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
 * Holds Error and Wanings
 *
 * @author Demian Gemperli <demian at gemperli.org>
 */
class ErrorHandler {
    private $errorMsg;
    private $warningMsg;

    public function setError($error) {$this->errorMsg = $error;}
    public function setWarning($warning) {$this->warningMsg = $warning;}
    public function getError() {return $this->errorMsg;}
    public function getWarning() {return $this->warningMsg;}
}
?>
