<?php

namespace Application\core;

use Application\core\Session;

class Message
{
    private $text;

    private $type;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $message
     *
     * @return Message
     */
    public function info(string $message): Message
    {
        $this->type = CONF_MESSAGE_INFO;
        $this->text = filter_var($message, FILTER_SANITIZE_STRIPPED);
        return $this;
    }

    /**
     * @param string $message
     *
     * @return Message
     */
    public function success(string $message): Message
    {
        $this->type = CONF_MESSAGE_SUCCESS;
        $this->text = filter_var($message, FILTER_SANITIZE_STRIPPED);
        return $this;
    }

    /**
     * @param string $message
     *
     * @return Message
     */
    public function warning(string $message): Message
    {
        $this->type = CONF_MESSAGE_WARNING;
        $this->text = filter_var($message, FILTER_SANITIZE_STRIPPED);
        return $this;
    }

    /**
     * @param string $message
     *
     * @return Message
     */
    public function error(string $message): Message
    {
        $this->type = CONF_MESSAGE_ERROR;
        $this->text = filter_var($message, FILTER_SANITIZE_STRIPPED);
        return $this;
    }

    /**
     * @return String
     */
    public function render(): String
    {
        $close = "this.parentElement.style.display='none'";
        return "<div class='" . CONF_MESSAGE_CLASS . " {$this->getType()}'>" .
                    "<span onclick=$close class='w3-button w3-large w3-display-topright w3-text-red w3-xlarge w3-hover-pale-red'>&times;</span>
                    <p>{$this->getText()}</p>
                </div>";
    }

    /**
     * @return String
     */
    public function __toString(): String
    {
        return $this->render();
    }

    public function flash()
    {
        (new Session())->set('flash', $this);
    }
}
