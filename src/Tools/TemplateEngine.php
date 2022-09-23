<?php

namespace App\Tools;

use Exception;

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
        $left_border = strpos($template, "{{");
        $right_border = strpos($template, "}}");
        while($left_border && $right_border){
            $replaced_str = substr($template, $left_border, $right_border-$left_border+2);
            $result_value_key = substr($template, $left_border+3, $right_border-$left_border-3);
            $result_value = $data[$result_value_key] ?? null;
            if(is_null($result_value))throw new UnknownParametrException("Template has unknown parameter");
            $template = str_replace($replaced_str, $result_value, $template);
            $left_border = strpos($template, "{{");
            $right_border = strpos($template, "}}");
        }
        return $template;
    }
}



class UnknownParametrException extends Exception{

}
