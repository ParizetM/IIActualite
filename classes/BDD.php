<?php 

class BDD 
{
    public static function connexionBDD()
    {
        $host = '127.0.0.1';
        $db = 'iiactualite';
        $user = 'root';
        $pass = '';
        $port = 3306;
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host; dbname=$db;charset=$charset;port=$port";
        return new PDO($dsn, $user, $pass);
    }
    public static function selectBDD($sql)
    {
        $pdo = self::connexionBDD();
        $resultat = $pdo->query($sql);
        return $resultat;
    }
}