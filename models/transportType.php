<?php class Type {

    /**
     * Méthode pour créer un utilisateur.
     * @param int $tansportType_ID ID du type de transport
     * @param string $TransportType_Name Nom du type de transport

     */






    public static function TypeDeTransport()
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, USERPSEUDO, USERPASSWORD);

            $sql = "SELECT * FROM `transporttype`";
            $query = $db->prepare($sql);
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }
}
?>