<?php

require('SARA/SQL/conexion.php');

// $sql=$base->prepare('select * from codigos where Tabla="RefaccionesMotor60HP" ');
// $sql->execute();

// while ($row=$sql->fetch(PDO::FETCH_ASSOC)){
// 	$sql2=$base->prepare('select * from Generales where Codigo="'.$row['Codigo'].'" order by descripcion');
// 	$sql2->execute();
// 	while ($row2=$sql2->fetch(PDO::FETCH_ASSOC)){
	

// 	// $sql2=$base->prepare('UPDATE Generales SET tabla="RefaccionesMotor60HP" where Codigo="'.$row['Codigo'].'"');
// 	// $sql2->execute();

// 	echo $row['id_codigos'].' '.$row['Codigo'].' '.$row['Tabla'].' '.$row2['descripcion'].' <br>';
// 	}	//echo $row['id_generales'].' '.$row['Codigo'].' '.$row['tabla'].' '.$row['descripcion'].'<br>';

	

// }


// $sql2=$base->prepare('DELETE FROM codigos where id_codigos=219');
// $sql2->execute();








// 207 6H341112A000 RefaccionesMotor60HP junta de lumbrera
// 207 6H341112A000 RefaccionesMotor60HP JUNTA LUMBRERA 
//     6h341112a000 $292 3 








// 	$sql=$base->prepare('select * from salidas where fecha BETWEEN "2019-06-21" AND "2019-06-21"');
// $sql->execute();

// while ($row=$sql->fetch(PDO::FETCH_ASSOC)){
// 		$tabla=$base->prepare('SELECT Tabla from codigos where Codigo="'.$row['codigo'].'"');
//  	$tabla->execute();
//  	while ($row3=$tabla->fetch(PDO::FETCH_ASSOC)) {
//  		$descripcion=$base->prepare('SELECT descripcion from Generales where Codigo="'.$row['codigo'].'" and tabla="'.$row3['Tabla'].'"');
//  		$descripcion->execute();
//  		while ($row2=$descripcion->fetch(PDO::FETCH_ASSOC)) {
//  			echo $row['id_salidas'].' -- ';
//  			echo $row['codigo'].' -- ';
//  			echo $row2['descripcion'].' -- ';
//  			echo $row['fecha'].' -- ';
//  			echo $row['cantidad'].' -- ';
//  			echo $row['total'].' -- ';
// 		echo '<br>';

//  		}
// 	}
// }



echo '------------------------------------';

// 	$sql=$base->prepare('update Generales set tabla="REFACCIONESDEMOTOR60FT" where tabla="REFACCIONESDEMOTOR604FT"');
// $sql->execute();

// // while ($row=$sql->fetch(PDO::FETCH_ASSOC)){


// //  			echo $row['Codigo'].' -- ';
// //  			echo $row['Tabla'].' -- ';
// // 		echo '<br>'; 


// // }

// echo '------------------------------------';
// echo '<br>';
// 	$sql=$base->prepare('SELECT id_generales, descripcion, codigo from Generales where codigo="90386-30048" ');
// $sql->execute();

// while ($row=$sql->fetch(PDO::FETCH_ASSOC)){

//  		echo $row['id_generales'].' -- ';
//  			echo $row['codigo'].' -- ';
//  			echo $row['descripcion'].' -- ';
// 		echo '<br>';


// }  

// echo '------------------------------------';
// echo '<br>';

// 	$sql=$base->prepare('SELECT * from codigos where Codigo="90386-30048" ');
// $sql->execute();

// while ($row=$sql->fetch(PDO::FETCH_ASSOC)){
// 		echo $row['id_codigos'].' -- ';

//  			echo $row['Codigo'].' -- ';
//  			echo $row['Tabla'].' -- ';
// 		echo '<br>';


// } 




// $result = $base->prepare("SHOW COLUMNS FROM codigos"); 
// $result->execute();
// while($row=$result->fetch(PDO::FETCH_ASSOC)){
//  echo $row['Field']." -- <br>"; }


// $fecha=date("Ymd-His");

// $salida_sql="SARA_".$fecha.".sql";

// $dump="mysqldump -h localhost -u id6594726_userdb -p 12345 --opt id6594726_db > ".$salida_sql;

// system($dump);


/**
 * This file contains the Backup_Database class wich performs
 * a partial or complete backup of any given MySQL database
 * @author Daniel López Azaña <daniloaz@gmail.com>
 * @version 1.0
 */
/**
 * Define database parameters here
 */
define("DB_USER", 'id6594726_userdb');
define("DB_PASSWORD", '12345');
define("DB_NAME", 'id6594726_db');
define("DB_HOST", 'localhost');
define("BACKUP_DIR", 'respaldo'); // Comment this line to use same script's directory ('.')
define("TABLES", '*'); // Full backup
//define("TABLES", 'table1, table2, table3'); // Partial backup
define("CHARSET", 'utf8');
define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
define("DISABLE_FOREIGN_KEY_CHECKS", true); // Set to true if you are having foreign key constraint fails
define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                            // Also number of rows per INSERT statement in backup file
/**
 * The Backup_Database class
 */
class Backup_Database {
    /**
     * Host where the database is located
     */
    var $host;
    /**
     * Username used to connect to database
     */
    var $username;
    /**
     * Password used to connect to database
     */
    var $passwd;
    /**
     * Database to backup
     */
    var $dbName;
    /**
     * Database charset
     */
    var $charset;
    /**
     * Database connection
     */
    var $conn;
    /**
     * Backup directory where backup files are stored 
     */
    var $backupDir;
    /**
     * Output backup file
     */
    var $backupFile;
    /**
     * Use gzip compression on backup file
     */
    var $gzipBackupFile;
    /**
     * Content of standard output
     */
    var $output;
    /**
     * Disable foreign key checks
     */
    var $disableForeignKeyChecks;
    /**
     * Batch size, number of rows to process per iteration
     */
    var $batchSize;
    /**
     * Constructor initializes database
     */
    public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
        $this->host                    = $host;
        $this->username                = $username;
        $this->passwd                  = $passwd;
        $this->dbName                  = $dbName;
        $this->charset                 = $charset;
        $this->conn                    = $this->initializeDatabase();
        $this->backupDir               = BACKUP_DIR ? BACKUP_DIR : '.';
        $this->backupFile              = 'myphp-backup-'.$this->dbName.'-'.date("Ymd_His", time()).'.sql';
        $this->gzipBackupFile          = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
        $this->disableForeignKeyChecks = defined('DISABLE_FOREIGN_KEY_CHECKS') ? DISABLE_FOREIGN_KEY_CHECKS : true;
        $this->batchSize               = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
        $this->output                  = '';
    }
    protected function initializeDatabase() {
        try {
            $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
            if (mysqli_connect_errno()) {
                throw new Exception('ERROR connecting database: ' . mysqli_connect_error());
                die();
            }
            if (!mysqli_set_charset($conn, $this->charset)) {
                mysqli_query($conn, 'SET NAMES '.$this->charset);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
        return $conn;
    }
    /**
     * Backup the whole database or just some tables
     * Use '*' for whole database or 'table1 table2 table3...'
     * @param string $tables
     */
    public function backupTables($tables = '*') {
        try {
            /**
             * Tables to export
             */
            if($tables == '*') {
                $tables = array();
                $result = mysqli_query($this->conn, 'SHOW TABLES');
                while($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }
            } else {
                $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
            }
            $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
            $sql .= 'USE `'.$this->dbName."`;\n\n";
            /**
             * Disable foreign key checks 
             */
            if ($this->disableForeignKeyChecks === true) {
                $sql .= "SET foreign_key_checks = 0;\n\n";
            }
            /**
             * Iterate tables
             */
            foreach($tables as $table) {
                $this->obfPrint("Backing up `".$table."` table...".str_repeat('.', 50-strlen($table)), 0, 0);
                /**
                 * CREATE TABLE
                 */
                $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                $sql .= "\n\n".$row[1].";\n\n";
                /**
                 * INSERT INTO
                 */
                $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                $numRows = $row[0];
                // Split table in batches in order to not exhaust system memory 
                $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform
                for ($b = 1; $b <= $numBatches; $b++) {
                    
                    $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                    $result = mysqli_query($this->conn, $query);
                    $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                    $numFields = mysqli_num_fields($result);
                    if ($realBatchSize !== 0) {
                        $sql .= 'INSERT INTO `'.$table.'` VALUES ';
                        for ($i = 0; $i < $numFields; $i++) {
                            $rowCount = 1;
                            while($row = mysqli_fetch_row($result)) {
                                $sql.='(';
                                for($j=0; $j<$numFields; $j++) {
                                    if (isset($row[$j])) {
                                        $row[$j] = addslashes($row[$j]);
                                        $row[$j] = str_replace("\n","\\n",$row[$j]);
                                        $row[$j] = str_replace("\r","\\r",$row[$j]);
                                        $row[$j] = str_replace("\f","\\f",$row[$j]);
                                        $row[$j] = str_replace("\t","\\t",$row[$j]);
                                        $row[$j] = str_replace("\v","\\v",$row[$j]);
                                        $row[$j] = str_replace("\a","\\a",$row[$j]);
                                        $row[$j] = str_replace("\b","\\b",$row[$j]);
                                        if ($row[$j] == 'true' or $row[$j] == 'false' or preg_match('/^-?[0-9]+$/', $row[$j]) or $row[$j] == 'NULL' or $row[$j] == 'null') {
                                            $sql .= $row[$j];
                                        } else {
                                            $sql .= '"'.$row[$j].'"' ;
                                        }
                                    } else {
                                        $sql.= 'NULL';
                                    }
    
                                    if ($j < ($numFields-1)) {
                                        $sql .= ',';
                                    }
                                }
    
                                if ($rowCount == $realBatchSize) {
                                    $rowCount = 0;
                                    $sql.= ");\n"; //close the insert statement
                                } else {
                                    $sql.= "),\n"; //close the row
                                }
    
                                $rowCount++;
                            }
                        }
    
                        $this->saveFile($sql);
                        $sql = '';
                    }
                }
                /**
                 * CREATE TRIGGER
                 */
                // Check if there are some TRIGGERS associated to the table
                /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                $result = mysqli_query ($this->conn, $query);
                if ($result) {
                    $triggers = array();
                    while ($trigger = mysqli_fetch_row ($result)) {
                        $triggers[] = $trigger[0];
                    }
                    
                    // Iterate through triggers of the table
                    foreach ( $triggers as $trigger ) {
                        $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                        $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                        $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                        $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                    }
                    $sql.= "\n";
                    $this->saveFile($sql);
                    $sql = '';
                }*/
 
                $sql.="\n\n";
                $this->obfPrint('OK');
            }
            /**
             * Re-enable foreign key checks 
             */
            if ($this->disableForeignKeyChecks === true) {
                $sql .= "SET foreign_key_checks = 1;\n";
            }
            $this->saveFile($sql);
            if ($this->gzipBackupFile) {
                $this->gzipBackupFile();
            } else {
                $this->obfPrint('Backup file succesfully saved to ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }
        return true;
    }
    /**
     * Save SQL to file
     * @param string $sql
     */
    protected function saveFile(&$sql) {
        if (!$sql) return false;
        try {
            if (!file_exists($this->backupDir)) {
                mkdir($this->backupDir, 0777, true);
            }
            file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }
        return true;
    }
    /*
     * Gzip backup file
     *
     * @param integer $level GZIP compression level (default: 9)
     * @return string New filename (with .gz appended) if success, or false if operation fails
     */
    protected function gzipBackupFile($level = 9) {
        if (!$this->gzipBackupFile) {
            return true;
        }
        $source = $this->backupDir . '/' . $this->backupFile;
        $dest =  $source . '.gz';
        $this->obfPrint('Gzipping backup file to ' . $dest . '... ', 1, 0);
        $mode = 'wb' . $level;
        if ($fpOut = gzopen($dest, $mode)) {
            if ($fpIn = fopen($source,'rb')) {
                while (!feof($fpIn)) {
                    gzwrite($fpOut, fread($fpIn, 1024 * 256));
                }
                fclose($fpIn);
            } else {
                return false;
            }
            gzclose($fpOut);
            if(!unlink($source)) {
                return false;
            }
        } else {
            return false;
        }
        
        $this->obfPrint('OK');
        return $dest;
    }
    /**
     * Prints message forcing output buffer flush
     *
     */
    public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
        if (!$msg) {
            return false;
        }
        if ($msg != 'OK' and $msg != 'KO') {
            $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
        }
        $output = '';
        if (php_sapi_name() != "cli") {
            $lineBreak = "<br />";
        } else {
            $lineBreak = "\n";
        }
        if ($lineBreaksBefore > 0) {
            for ($i = 1; $i <= $lineBreaksBefore; $i++) {
                $output .= $lineBreak;
            }                
        }
        $output .= $msg;
        if ($lineBreaksAfter > 0) {
            for ($i = 1; $i <= $lineBreaksAfter; $i++) {
                $output .= $lineBreak;
            }                
        }
        // Save output for later use
        $this->output .= str_replace('<br />', '\n', $output);
        echo $output;
        if (php_sapi_name() != "cli") {
            if( ob_get_level() > 0 ) {
                ob_flush();
            }
        }
        $this->output .= " ";
        flush();
    }
    /**
     * Returns full execution output
     *
     */
    public function getOutput() {
        return $this->output;
    }
}
/**
 * Instantiate Backup_Database and perform backup
 */
// Report all errors
error_reporting(E_ALL);
// Set script max execution time
set_time_limit(900); // 15 minutes
if (php_sapi_name() != "cli") {
    echo '<div style="font-family: monospace;">';
}
$backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
$result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'OK' : 'KO';
$backupDatabase->obfPrint('Backup result: ' . $result, 1);
// Use $output variable for further processing, for example to send it by email
$output = $backupDatabase->getOutput();
if (php_sapi_name() != "cli") {
    echo '</div>';
}
?> 