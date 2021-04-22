<?php
class BoardView{
    private $board;

    function __construct(Board $board)
    {
        $this->board=$board;
    }


    public function GenerateBoardAdminHtml(){
        echo"<div class=\"boardWrapper\">   
        <div class=\"boardTitle\">  ".$this->board->GetTitle()." </div>
        <div class=\"boardContent\">". $this->board->GetDescription(). " </div>
        <div class=\"boardFooter\">Created at ". $this->board->GetDate(). " by ". $this->board->GetUserName(). "       
        <input type=\"submit\" value=\"Delete\" name=\"deleet\" class=\"deleet btnChangeBoard\" id=\"".$this->board->GetId()."\">
        </div>
       

      </div>";
    }


    public function GenerateBoardHtml(){
        echo"<div class=\"boardWrapper\">   
        <div class=\"boardTitle\">".$this->board->GetTitle()." </div>
        <div class=\"boardContent\">". $this->board->GetDescription(). " </div>
        <div class=\"boardFooter\">Created at  ". $this->board->GetDate(). " by ". $this->board->GetUserName(). " </div>        
        <input type=\"text\" name=\"description\" id=\"txt".$this->board->GetId()."\" class=\"boardTextboxChangeDesc\">
        <input type=\"submit\" value=\"Change board content\" name=\"Change\" id=\"".$this->board->GetId()."\" class=\"updaat btnChangeBoard\">
        

      </div>";
    }
}

?>