<?php

/* 
 * CONFIGURAÇÕES GERAIS
 */
define('APPROOT', dirname(dirname(__FILE__)));
define("BASE_URL", 'http://localhost/php-mvc-project');   
define("THEME", "web");
define("SITE_NAME", "PHP MVC Project");
define("CONTROLLER_DEFAULT", "Home");

//DATABASE
define("DB_HOST", 'localhost');
define("DB_NAME", 'db_name');
define("DB_USER", 'db_user');
define("DB_PASS", 'db_passwd');
define("DB_PORT", '3306');
define("DB_DRIVE", 'mysql');

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/*
 * CONFIG CLASS MESSAGE
 */
define("CONF_MESSAGE_CLASS", '');
define("CONF_MESSAGE_INFO", '');
define("CONF_MESSAGE_SUCCESS", '');
define("CONF_MESSAGE_WARNING", '');
define("CONF_MESSAGE_ERROR", '');
