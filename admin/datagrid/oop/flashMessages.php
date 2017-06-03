<?php
class flashMessages {
    private $messages = [];
    
    private function isAnyMessages(){
        if(count($this->messages) == 0){return FALSE;}
        else{return TRUE;}
    }
    
    public function addMessage($text,$type="info"){
        $this->messages[] = [
            "text" => $text,
            "type" => $type,
        ];
    }
    
    public function renderMessages(){
        if($this->isAnyMessages() == FALSE){die;}
        else{
            foreach($this->messages as $message){
                printf("<div class='alert alert-%s'>%s</div>",$message["type"],$message["text"]);
            }
        }
    }
}
