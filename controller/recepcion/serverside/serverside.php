<?php
include '../../../model/modelo_conexion.php';
class TableDataRecepcion extends conexionBD{ 
    private $_db;
    public function __construct() { 
            $this->_db = conexionBD::conexionPDO();
                            
    }   
    public function getObtnerListadoRecepcion($table, $index_column, $columns) {
        // Paging
        $sLimit = "";
        if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ) {
            $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".intval( $_GET['iDisplayLength'] );
        }
        
        // Ordering
        $sOrder = "";
        if ( isset( $_GET['iSortCol_0'] ) ) {
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ) {
                if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ) {
                    $sortDir = (strcasecmp($_GET['sSortDir_'.$i], 'DESC') == 0) ? 'ASC' : 'DESC';
                    $sOrder .= "`".$columns[ intval( $_GET['iSortCol_'.$i] ) ]."` ". $sortDir .", ";
                }
            }
            
            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" ) {
                $sOrder = "";
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        

        $sWhere = "";
        if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($columns) ; $i++ ) {
                if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ) {
                    $sWhere .= "`".$columns[$i]."` LIKE :search OR ";
                }
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
       
        
        // Individual column filtering
        // esto se puso
        for ($i = 0; $i < count($columns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
        
                // Ajusta la lógica de búsqueda para la columna "estado"
                if ($columns[$i] == 'rece_estado') {
                    $sWhere .= "`" . $columns[$i] . "` LIKE :search_status ";
                } else {
                    $sWhere .= "`" . $columns[$i] . "` LIKE :search" . $i . " ";
                }
            }
        } // termina
         // Modificar esta parte
       
         
       
        

        

        
        // SQL queries get data to display
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $columns))."` FROM `".$table."` ".$sWhere." ".$sOrder." ".$sLimit;
        $statement = $this->_db->prepare($sQuery);
        
  

        // esto se puso
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $statement->bindValue(':search', '%' . $_GET['sSearch'] . '%', PDO::PARAM_STR);
        }
        
        // Ajusta el bind para la búsqueda de estado
        if (isset($_GET['sSearch_' . $i]) && $_GET['sSearch_' . $i] != '') {
            $statement->bindValue(':search_status', '%' . $_GET['sSearch_' . $i] . '%', PDO::PARAM_STR);
        } 
        // termina

 
        $statement->execute();
        $rResult = $statement->fetchAll();

        
        for ( $i=0 ; $i<count($columns) ; $i++ ) {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ) {
                $statement->bindValue(':search'.$i, '%'.$_GET['sSearch_'.$i].'%', PDO::PARAM_STR);
            }
        }
        if (isset($_GET['idusuario_filtro']) && $_GET['idusuario_filtro'] != '') {
            $sWhere .= " AND `usuario_registrador` = :idusuario_filtro";
            //var_dump($_GET['idusuario_filtro']);
        } else {
           // var_dump("idusuario_filtro no está presente o es vacío");
        }
        
        
        // ... Resto del código ...
        
        // Añadir esta verificación después de ejecutar la consulta
        if (!$statement->execute()) {
            die('Error en la ejecución de la consulta: ' . print_r($statement->errorInfo(), true));
        }
       
        
        $iFilteredTotal = current($this->_db->query('SELECT FOUND_ROWS()')->fetch());
        
        // Get total number of rows in table
        $sQuery = "SELECT COUNT(`".$index_column."`) FROM `".$table."`";
        $iTotal = current($this->_db->query($sQuery)->fetch());
        
        // Output
        // $output = array(
        //     "sEcho" => intval($_GET['sEcho']),
        //     "iTotalRecords" => $iTotal,
        //     "iTotalDisplayRecords" => $iFilteredTotal,
        //     "aaData" => array()
        // );
        $output = array(
            "sEcho" => isset($_GET['sEcho']) ? intval($_GET['sEcho']) : 0,
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        
        // Return array of values
        foreach($rResult as $aRow) {
            $row = array();         
            for ( $i = 0; $i < count($columns); $i++ ) {
                if ( $columns[$i] == "version" ) {
                    // Special output formatting for 'version' column
                    $row[] = ($aRow[ $columns[$i] ]=="0") ? '-' : $aRow[ $columns[$i] ];
                }
                else if ( $columns[$i] != ' ' ) {
                    $row[] = $aRow[ $columns[$i] ];
                }
            }
            $output['aaData'][] = $row;
        }

        
        
        echo json_encode( $output );
    }
}
$table_data = new TableDataRecepcion();
?>
