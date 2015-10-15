<?php

class Form extends Component
{
    /**
     * @var Field[]
    */
    private $fields = array();
    private $args = array();
    private $template;
    private $name;

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return Form
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return $this->args;
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
     * @return Form
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param array $fields
     * @return Form
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param array $args
     * @return Form
     */
    public function setArgs($args)
    {
        $this->args = $args;
        return $this;
    }

    public function validate()
    {
        foreach($this->fields as $field)
        {
            if(!$field->validate()) {
                return false;
            }
        }
        return true;
    }

    public function render()
    {
        $fields = '';
        foreach($this->fields as $field) {
            $fields[$field->getName()] = $field->render();
        }
        return $this->get('render')->render($this->template,
            array(
                'name' => $this->name,
                'args' => $this->args,
                'fields' => $fields
            ));
    }

}