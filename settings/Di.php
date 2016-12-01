<?php


namespace Settings;

/**
 * 
 */
class Di 
{

    public $setName = array();

    public function set($name, $value)
    {
        $this->setName[$name] = $value;
        return;
    }
    
    public function get($name, $value = false)
    {
        if(isset($this->setName[$name])){
            return $this->setName[$name];
        }elseif(method_exists($this, "set".$name) && is_array($value)){
            $func = "set".$name;
            $class = $this->$func($value);
            return $class;
        }
        return false;
    }
    
    private function setfacade($file_name)
    {
        $file = __DIR__ . '/../facade/'.$file_name[0].'.php';
        require_once $file;
        // ディレクトリ構造でくる場合の対策
        $instance_name = ( strstr($file_name[0], '/') ) ? ucfirst(substr(stristr($file_name[0],'/'), 1)) : $file_name[0];
        $class = new $instance_name($this);
        //new_model->initialize();

        return $class;
    }
    
    private function setdebug()
    {
        $file = __DIR__ . '/Debug.php';
        require_once $file;

        $class = new Debug();

        return $class;
    }
    
    private function setcsv($file_name)
    {
        $file = __DIR__ . '/../dao/csv/'.$file_name[0].'.php';
        require_once $file;
        // ディレクトリ構造でくる場合の対策
        $instance_name = ( strstr($file_name[0], '/') ) ? ucfirst(substr(stristr($file_name[0],'/'), 1)) : $file_name[0];
        $class = new $instance_name($this);

        return $class;
    }

}
