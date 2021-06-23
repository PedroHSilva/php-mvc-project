<?php

/**
 * @param string $uri
 * @return string
 */
function url(string $uri = ''): string
{
    if (strlen($uri) && $uri[0] == '/') {
        return $url = BASE_URL . $uri;
    }
    return BASE_URL . '/' . $uri;
}

/**
 * @param string $email
 * @return bool
 */
function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $password
 * @return bool
 */
function is_password(string $password): bool
{
    if (password_get_info($password)['algo'] || mb_strlen($password) >= CONF_PASSWD_MIN_LEN && mb_strlen($password) <= CONF_PASSWD_MAX_LEN) {
        return true;
    }

    return false;
}

/**
 * @param string $password
 *
 * @return string
 */
function password(string $password): string
{
    if (!empty(password_get_info($password)['algo'])) {
        return $password;
    }
    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

function password_rehash(string $hash): bool
{
    return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * Verifica se tem alguma mensagem na sessão e retorna caso encontre
 * @return string|null
 */
function flash(): ?string
{
    $session = new \Application\core\Session();
    if($flash = $session->flash()) {
        echo $flash;
    }
    return null;
}
