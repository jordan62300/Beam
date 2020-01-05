<?php 
namespace Form;

class Form {


    public function newField($name , $type) {
        return "
                    <div class=\"form-group text-center\">
                        <label class=\"text-center\" for='{$name}'>{$name} : </label>
                        <input class=\"form-control\" type='{$type}' name='{$name}'>
                    </div>
                ";           
    }
    
    public function submitBtn(){
        return "<button type=\"submit\" class=\"mt-4 btn btn-success\">Envoyer</button>";
    }
    
}