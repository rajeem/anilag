<?php

/**
 * Dump data from MySQL database
 *
 * @name    MySQLDump
 * @author  Marcus Vincius <mv@cidademais.com.br>
 * @version 1.1 2005-06-01
 * @example
 *
 * $dump = new MySQLDump();
 * print $dump->dumpDatabase("mydb");
 *
 */
$the_data = '';
class MySQLDump
{

    /**
     * Dump data and structure from MySQL database
     *
     * @param string $database
     * @return string
     */
    public function dumpDatabase($database)
    {

        // Set content-type and charset
        header('Content-Type: text/html; charset=iso-8859-1');

        // Connect to database
        $db = mysql_select_db($database);

        if (!empty($db)) {

            // Get all table names from database
            $c = 0;
            $result = mysql_list_tables($database);
            for ($x = 0; $x < mysql_num_rows($result); $x++) {

                $table = mysql_tablename($result, $x);
                //echo $table.'<br>';
                if (!empty($table)) {
                    $arr_tables[$c] = mysql_tablename($result, $x);
                    $c++;
                }
            }

            // List tables
            $dump = "DROP SCHEMA IF EXISTS $database; \nCREATE DATABASE $database; \nUSE $database; \n";
            for ($y = 0; $y < count($arr_tables); $y++) {

                // DB Table name
                $table = $arr_tables[$y];
                // Structure Header
                $structure .= "-- \n";
                $structure .= "-- Table structure for table `{$table}` \n";
                $structure .= "-- \n\n";

                // Dump Structure
                $structure .= "DROP TABLE IF EXISTS `{$table}`; \n";
                $structure .= "CREATE TABLE `{$table}` (\n";
                $result = mysql_db_query($database, "SHOW FIELDS FROM `{$table}`");
                while ($row = mysql_fetch_object($result)) {

                    $structure .= "  `{$row->Field}` {$row->Type}";
                    $structure .= (!empty($row->Default)) ? " DEFAULT '{$row->Default}'" : false;
                    $structure .= ($row->Null != "YES") ? " NOT NULL" : false;
                    $structure .= (!empty($row->Extra)) ? " {$row->Extra}" : false;
                    $structure .= ",\n";

                }

                $structure = ereg_replace(",\n$", "", $structure);

                // Save all Column Indexes in array
                unset($index);
                $result = mysql_db_query($database, "SHOW KEYS FROM `{$table}`");
                while ($row = mysql_fetch_object($result)) {

                    if (($row->Key_name == 'PRIMARY') and ($row->Index_type == 'BTREE')) {
                        $index['PRIMARY'][$row->Key_name] = $row->Column_name;
                    }

                    if (($row->Key_name != 'PRIMARY') and ($row->Non_unique == '0') and ($row->Index_type == 'BTREE')) {
                        $index['UNIQUE'][$row->Key_name] = $row->Column_name;
                    }

                    if (($row->Key_name != 'PRIMARY') and ($row->Non_unique == '1') and ($row->Index_type == 'BTREE')) {
                        $index['INDEX'][$row->Key_name] = $row->Column_name;
                    }

                    if (($row->Key_name != 'PRIMARY') and ($row->Non_unique == '1') and ($row->Index_type == 'FULLTEXT')) {
                        $index['FULLTEXT'][$row->Key_name] = $row->Column_name;
                    }

                }

                //
                // Return all Column Indexes of array
                if (is_array($index)) {
                    foreach ($index as $xy => $columns) {

                        $structure .= ",\n";

                        $c = 0;
                        foreach ($columns as $column_key => $column_name) {

                            $c++;

                            $structure .= ($xy == "PRIMARY") ? "  PRIMARY KEY  (`{$column_name}`)" : false;
                            $structure .= ($xy == "UNIQUE") ? "  UNIQUE KEY `{$column_key}` (`{$column_name}`)" : false;
                            $structure .= ($xy == "INDEX") ? "  KEY `{$column_key}` (`{$column_name}`)" : false;
                            $structure .= ($xy == "FULLTEXT") ? "  FULLTEXT `{$column_key}` (`author`,`title`,`call_num`,`other_author1`,`other_author2`,`other_author3`,`other_author4`,`place_pub`,`publisher`,`date_pub`,`edition`,`isbn`,`subject1`,`subject2`,`subject3`,`subject4`)
" : false;
                            //echo $column_key.'<br>';//wala ito dati
                            $structure .= ($c < (count($index[$xy]))) ? ",\n" : false;

                        }
                        //put here the other key
                        //$structure .='hahaha';

                    }

                }

                $structure .= "\n) ENGINE = MYISAM ;\n\n";

                // Header
                $structure .= "-- \n";
                $structure .= "-- Dumping data for table `$table` \n";
                $structure .= "-- \n\n";

                // Dump data
                //$data='';
                unset($data); //currently uncomment
                $result = mysql_query("SELECT * FROM `$table`");
                $num_rows = mysql_num_rows($result);
                $num_fields = mysql_num_fields($result);

                for ($i = 0; $i < $num_rows; $i++) {

                    $row = mysql_fetch_object($result);
                    $data .= "INSERT INTO `$table` (";

                    // Field names
                    for ($x = 0; $x < $num_fields; $x++) {

                        $field_name = mysql_field_name($result, $x);

                        $data .= "`{$field_name}`";
                        $data .= ($x < ($num_fields - 1)) ? ", " : false;

                    }

                    $data .= ") VALUES (";

                    // Values
                    for ($x = 0; $x < $num_fields; $x++) {
                        $field_name = mysql_field_name($result, $x);

                        $data .= "'" . str_replace('\"', '"', mysql_escape_string($row->$field_name)) . "'";
                        $data .= ($x < ($num_fields - 1)) ? ", " : false;

                    }

                    $data .= ");\n";
                }

                $data .= "\n";

                $dump .= $structure . $data;
                $dump .= "-- --------------------------------------------------------\n\n";
                $structure = '';
                $the_data .= $data;

            }

            return $dump;
            //return $structure;
            //return $data;
            //return $the_data;

        }

    }

}
