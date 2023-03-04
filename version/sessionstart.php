<?php
###############################
# sessionstart.php
# inicia la session si esta inactiva
# 15/03/2020
# Juan Carlos C - vp
###############################

/* Opciones de session_status()	*/
# session_status()
# 0-PHP_SESSION_DISABLED si las sesiones están deshabilitadas.
# 1-PHP_SESSION_NONE si las sesiones están habilitadas, pero no existe ninguna.
# 2-PHP_SESSION_ACTIVE si las sesiones están habilitadas, y existe una.

/**
 * @return bool
 */

if (is_session_started() === FALSE) {
	session_start();
} else {
	header("location:logout.php?msg=sessionEnd&org=account&pagelog=" . $pageLog);
}

//============
// FUNCTIONS
//============

function is_session_started()
{
	if (php_sapi_name() !== 'cli') {
		if (version_compare(phpversion(), '7.1', '>=')) {
			return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
		} else {
			return session_id() === '' ? FALSE : TRUE;
		}
	}
	return FALSE;
}
