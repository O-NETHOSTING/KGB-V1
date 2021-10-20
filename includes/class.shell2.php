<?php
/* ************************************************************ */
/*
*   Copyright (C) 2008 Volkan KIRIK
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*/
/* ************************************************************ */
/*
*   SSH - SFTP (class.shell2.php)
*   v 1.0 2007-08-13
*   v 1.1 2008-05-19 -current-
*
*   Author : Volkan KIRIK
*
*   Changes in v1.1:
*
*   * Added Disconnect function
*   * Some function names changed:
*   auth to auth_pwd
*   send to send_file
*   get to get_file
*   output to get_output
*
*   Changes in v1.0:
*
*   * First release
*
*/
/* ************************************************************ */

class shell2 {
	var $conn;
	var $error;
	var $stream;

	function login($user, $pass, $host, $port=22) {
		if ($this->connect($host,$port)) {
			if ($this->auth_pwd($user,$pass)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function connect($host,$port=22) {
		if ($this->conn = ssh2_connect($host, $port)) {
			return true;
		} else {
			$this->error = '[x] Can not connected to '.$host.':'.$port;
			return false;
		}
	}

	function auth_pwd($u,$p) {
		if (ssh2_auth_password($this->conn, $u, $p)) {
			return true;
		} else {
			$this->error = 'Login Failed';
			return false;
		}
	}

	function send_file($localFile,$remoteFile,$permision) {
		if (@ssh2_scp_send($this->conn, $localFile, $remoteFile, $permision)) {
			return true;
		} else {
			$this->error = 'Can not transfer file';
			return false;
		}
	}

	function get_file($remoteFile,$localFile) {
		if (ssh2_scp_recv($this->conn, $remoteFile, $localFile)) {
			return true;
		} else {
			return false;
		}
	}

	function exec_cmd($cmd) {
		$this->stream=ssh2_exec($this->conn, $cmd);
		stream_set_blocking( $this->stream, true );
	}

	function get_output() {
		$line = '';
		while ($get=fgets($this->stream)) {
			$line.=$get;
		}
		return $line;
	}

	function disconnect() {
		// if disconnect function is available call it..
		if ( function_exists('ssh2_disconnect') ) {
			ssh2_disconnect($this->conn);
		} else { // if no disconnect func is available, close conn, unset var
			@fclose($this->conn);
			unset($this->conn);
		}
		// return null always
		return NULL;
	}
}

?>