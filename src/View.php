<?php


namespace Wepesi;

class View
{

    private array $data = [];
    private string $render;
    private string $folder_name;
    private string $root_folder;

    function __construct(string $folder_name = '/')
    {
        define("Wepesi\ROOT", str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
        $this->root_folder = ROOT."views";
        define("Wepesi\ERROR_VIEW", ROOT . $this->root_folder.'/404.php');
        $this->render = ERROR_VIEW;
        $this->folder_name = $this->addSlashes($folder_name);
    }

    function setRoot(string $root){
        $this->root_folder = ROOT.$this->addSlashes($root);
    }
    /**
     * call this method to display file content
     * @param string $file_name
     */
    function display(string $file_name)
    {
        $file = $this->checkFileExtension($file_name);
        $file_source = $this->folder_name . $this->addSlashes($file);
        if (is_file($this->root_folder . $file_source)) {
            $this->render = $this->root_folder . $file_source;
        }
    }

    /**
     * assign variables data to be displayed on file_page
     * @param string $key
     * @param $value
     */
    function assign(string $key, $value)
    {
        $this->data[$key] = $value;
    }
    /**
     * @param $link
     * @return false|mixed|string
     */
    private function addSlashes($link)
    {
        $sub_string = substr($link, 0, 1);
        $new_link = substr($link, 1);
        if ($sub_string == '/') {
            $link = substr($this->addSlashes($new_link),1);
        }
        return $link == '' ? $link : '/' . $link;
    }

    /**
     * @param $fileName
     * @return mixed|string
     */
    private function checkFileExtension($fileName)
    {
        $file_parts = pathinfo($fileName);
        return isset($file_parts['extension']) ? $fileName : $fileName . '.php';
    }

    function __destruct()
    {
        extract($this->data);
        if (is_file($this->render)) {
            include($this->render);
        } else {
            print_r(['exception' => 'file path is not correct.?']);
        }
    }
}