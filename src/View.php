<?php

namespace Wepesi\App;

class View
{

    private string $view_location;
    private ?string $layout;
    private array $data;

    public function __construct(string $view_location)
    {
        $this->view_location = $view_location;
        $this->layout = null;
        $this->data = [];
    }

    public function assign(string $key,$value){
        $this->data[$key] = $value;
    }

    public function render(string $file_location){     
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($file_location);
        if($this->layout){
            print(str_replace("{{content}}",$viewContent,$layoutContent));
        }else{
            print($viewContent);
        }   
    }

    public function setLayout(string $layout){
        $this->layout = $this->checkFileExtension($this->view_location.$layout);
    }
    protected function layoutContent(){
        if($this->layout)
        {
            $this->exception($this->layout);
            foreach($this->data as $key=>$value){
                $$key = $value;
            }
            ob_start();
            include_once  $this->layout;
            return ob_get_clean();
        }
    }
    protected function renderOnlyView(string $view){
        $view_file = $this->checkFileExtension($this->view_location."/".trim($view,"/"));
        $this->exception($view_file);
        foreach($this->data as $key=>$value){
            $$key = $value;
        }
        ob_start();
        include_once $view_file;
        return ob_get_clean();
    }

    private function exception(string $file_path){
        if(!is_file($file_path)){
            throw new \InvalidArgumentException("$file_path file does not exist");
        }
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
}