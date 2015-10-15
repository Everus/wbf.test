<?php

class Field extends Component
{
    private $name;
    private $args;
    private $template;
    private $value;
    /**
     * @var abstractValidator
    */
    private $validator;

    public function render()
    {
        return $this->get('render')->render($this->template,
            array(
                'name' => $this->name,
                'args' => $this->args
            ));
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Field
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * @param mixed $args
     * @return Field
     */
    public function setArgs($args)
    {
        $this->args = $args;
        return $this;
    }

    /**
     * @param string
     * @param mixed
     * @return Field
    */
    public function addArg($name, $value)
    {
        $this->args[$name] = $value;
        return $this;
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
     * @return Field
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Field
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return abstractValidator
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param abstractValidator $validator
     * @return Field
     */
    public function setValidator(\abstractValidator $validator)
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * @return boolean
    */
    public function validate()
    {
        if($this->validator === null) {
            return true;
        }
        return $this->validator->validate($this->value);
    }

}