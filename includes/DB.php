<?php

class DB
{
    protected $model;
    protected $params = [];
    private $store = 'db/';

    public function __construct($model)
    {
        if (!file_exists($this->store)) {
            mkdir($this->store);
        }

        if (!file_exists($this->store . $model)) {
            touch($this->store . $model);
        }

        $this->model = $this->store . $model;
        $this->params  = $_REQUEST;
    }

    public function get()
    {
        $result = file_get_contents($this->model);
        if (!$result) {
            return [];
        }
        return json_decode($result, true);
    }

    public function set($data)
    {
        $db = $this->get();
        $data['id'] = count($db) + 1;
        $db[] = $data;
        $file = fopen($this->model, 'w');
        fwrite($file, json_encode($db));
        fclose($file);
        return $data;
    }

    public function getParam($field = false)
    {
        if (!$field) {
            return $this->params;
        }

        if (is_array($field)) {
            $data = [];
            foreach ($field as $f) {
                $data[$f] = $this->getParam(($f));
            }
            return $data;
        } else {
            return isset($this->params[$field]) ? $this->params[$field] : '';
        }
    }
}