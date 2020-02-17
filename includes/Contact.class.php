<?php

class Contact extends DB
{
    private $fields = ['fullname', 'phone', 'email', 'sex', 'items', 'month', 'remark'];

    public function __construct()
    {
        parent::__construct('contact.json');
    }

    public function save()
    {
        $data = $this->getParam($this->fields);
        return $this->set($data);
    }
}