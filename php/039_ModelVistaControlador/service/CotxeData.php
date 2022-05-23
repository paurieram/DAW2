<?php

class CotxeData {
    private $mysqli;
    function __construct() {
        $this->mysqli = new mysqli("localhost", "daw2", "daw22021", "MCV_Cotxes");
    }
    function getAllCotxes() {
        $cotxes = [];
        $sql = "SELECT * FROM cotxes";
        $res = $this->mysqli->query($sql);
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $cotxes[] = new Cotxe($row["idcotxe"],$row["marca"],$row["model"],$row["color"],$row["idpropietari"]);
        }
        return $cotxes;
    }
    function insertCotxe() {

    }
    function updateCotxe($idcotxe,$data) {
        $sql = "UPDATE cotxes SET marca='".$data["brand"]."', model='".$data["model"]."', color='".$data["color"]."', idpropietari=".$data["owner"]." WHERE idcotxe = $idcotxe;"; 
        $this->mysqli->query($sql);
    }
}
?>