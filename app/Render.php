<?php


class Render
{
    private $context = array();
    private $template;

    /**
     * Render a template in context
     * @param string $template Path to template
     * @param mixed[] $context Context in with template is rendered
     * @return string Return result of template render
    */
    public function render($template = null, $context = null)
    {
        $this->template = ($template === null) ? $this->template : $template;
        $this->context = ($context === null) ? $this->context : $context;
        ob_start();
        include($this->template);
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }
}