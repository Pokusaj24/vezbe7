<?php
require_once 'db.php';

class DAO {
    private $db;
    private $SELECT_PRVI_AUTO = "SELECT id, marka, cena FROM Auto WHERE marka = ? ORDER BY id ASC LIMIT 1";

    public function __construct() {
        $this->db = DB::createInstance();
    }

    public function vratiPrvi($marka) {
        $statement = $this->db->prepare($this->SELECT_PRVI_AUTO);
        $statement->bindValue(1, $marka);
        $statement->execute();
        return $statement->fetch();
    }
}
?>
