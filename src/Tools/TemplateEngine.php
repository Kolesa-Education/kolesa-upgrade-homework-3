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
        $fileContent = file_get_contents($templatePath);
        return $fileContent;
    }

    private function substituteVariables(string $template, array $data=[]):string
    {
        foreach($data as $key => $variable){
            $templatedKey = '{{$' . $key . "}}";
            if(!strpos($template, $templatedKey))throw new ErrorException("Variable doesn't exist in template");
            $template = str_replace($templatedKey, $variable, $template);
        }
        
        return $template;
    }
}
