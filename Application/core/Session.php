<?php

namespace Application\core;

use Application\core\Message;

class Session
{
    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function get(string $name)
    {
        if (!empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return null;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return $this->has($name);
    }

    /**
     * @return object|null
     */
    public function all(): ?object
    {
        return (object) $_SESSION;
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return Session
     */
    public function set(string $key, $value): Session
    {
        $_SESSION[$key] = (is_array($value) ? (object) $value : $value);
        return $this;
    }

    /**
     * @param string $key
     * @return Session
     */
    function unset(string $key): Session {
        unset($_SESSION[$key]);
        return $this;
    }

    /**
     * @return Session
     */
    public function regenerate(): Session
    {
        session_regenerate_id(true);
        return $this;
    }

    /**
     * @return Session
     */
    public function destroy(): Session
    {
        session_destroy();
        return $this;
    }

    public function flash(): ?Message
    {
        if($this->has('flash')) {
            $flash = $this->get('flash');
            $this->unset('flash');
            return $flash;
        }
        return null;
    }

    public function csrf(): void
    {
        $_SESSION['csrf_token'] = md5(uniqid(rand(), true));
    }
}
