<?php

class CotxeController{
    var $cotxes;
    /**
     * It creates a new instance of the CotxeData class, then it calls the getAllCotxes() method on
     * that instance, and finally it assigns the result of that method to the ->cotxes property.
     */
    function __construct(){
        $cotxedata = new CotxeData;
        $this->cotxes = $cotxedata->getAllCotxes();
    }
    public function index(){
        $rowset = $this->cotxes;
        $controller = $this;
        require("view/index.php");
    }
    public function viewcar($idcotxe){
        foreach($this->cotxes as $cotxe){
            if ($cotxe->getId() == $idcotxe){
                $row = $cotxe;
                $controller = $this;
                require("view/showcotxe.php");
            }
        }
    }
    public function UpdateCotxe($idcotxe,$data){
        $cotxedata = new CotxeData;
        $cotxedata->updateCotxe($idcotxe,$data);
        foreach($this->cotxes as $cotxe){
            if ($cotxe->getId() == $idcotxe){
                $row = $cotxe;
                $message = "<script>alert('Modificat correctament')</script>";
                $controller = $this;
                require("view/editcotxe.php");
            }
        }
    }
    public function formUpdateCotxe($idcotxe){
        foreach($this->cotxes as $cotxe){
            if ($cotxe->getId() == $idcotxe){
                $row = $cotxe;
                $controller = $this;
                require("view/editcotxe.php");
            }
        }
    }
}