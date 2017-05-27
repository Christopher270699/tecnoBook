<?php
class Database extends PDO{
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        
        //Constructor Original
        //parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
        
        //Constructor alterado para tildes
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8', $DB_USER, $DB_PASS);
    }
    /*select
     * @param string $sql un SQL String
     * @param string $data un asocio de array
     */
    public function select($sql, $array = array(), $fechMode = PDO::FETCH_ASSOC){
        
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value){
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fechMode);
    }
    /*insertar
     * @param string $table un nombre de tabla para insertar
     * @param string $data un asocio de array
     */
    public function insert($table, $data)
    {
        //ksort($data);
        $fieldNames = implode('`,`', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));   
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES  ($fieldValues)");
        
        foreach ($data as $key => $value){
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }
    /*actualizar
     * @param string $table un nombre de tabla para insertar
     * @param string $data un asocio de array
     * @param string $where parte del query where
     */ 
    public function update($table, $data, $where){
        
        $fieldDetails = NULL;
        foreach($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }
    /*delete
     * @param string $table un nombre de tabla para borrar
     * @param string $limit limite a borrar
     * @param string $where parte del query where
     */ 
    public function delete($table, $where, $limit = 1){
        
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
        
    }
}
?>
