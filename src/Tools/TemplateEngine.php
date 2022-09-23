<?php

namespace App\Tools;

use ErrorException;

class TemplateEngine{
    public function render(string $templatePath, array $data = []):string
    {
        $template = $this->loadTemplate($templatePath);
        $result = $this->substituteVariables($template, $data);
        return $result;
    }

    private function loadTemplate(string $templatePath):string
    {
        $file_content = file_get_contents($templatePath);
        return $file_content;
    }

    private function substituteVariables(string $template, array $data=[]):string
    {
        foreach($data as $key => $variable){
            $templated_key = '{{$' . $key . "}}";
            if(!strpos($template, $templated_key))throw new ErrorException("Variable doesn't exist in template");
            $template = str_replace($templated_key, $variable, $template);
        }
        
        return $template;
    }
}
