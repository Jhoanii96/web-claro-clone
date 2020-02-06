<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
	
*/


$this->model = new adminModel();

if ($link == ''){
    $this->model2 = new adminModel();
    $this->BellNtf = $this->model2->BellNotifications();
    $this->datos_articulo = $this->model->mostrar_tarticulo();
    
    $this->AdminView('admin/news/news', [
        'nombre' => $this->datos_org['nombre'], 
        'apellido' => $this->datos_org['apellido'], 
        'rol' => $this->datos_org['rol'], 
        'fotoUsu' => $this->datos_org['fotoUsu'],
        'BellNtf' => $this->BellNtf, 
        'datos_articulo' => $this->datos_articulo
    ]);
    
} else if($link == 'edit') {

    @$update = $_POST['update'];
    if($update == "true") {
        
        $numart = $_POST['numart'];
        
        $title = $_POST['title'];
        $stitle = $_POST['stitle'];
        $desc = $_POST['desc']; 
        // comprobación de cambios en la imagen
        @$textimage = $_POST['textImage'];

        $date = $_POST['date'];
        $d = $_POST['d'];  // duration o vencimiento
        $devent = $_POST['devent']; // fecha de evento
        @$fechaFija = $_POST['fechaFija'];

        if($fechaFija == NULL) {
            $fechaFija = 0;
        } else {
            $fechaFija = 1;
        }

        $tags = $_POST['tags'];
        $word = preg_replace('[\]]','',$tags);
        $word = preg_replace('[\[]','',$word);
        $word = preg_replace('[\{]','',$word);
        $word = preg_replace('[\}]','',$word);
        $word = preg_replace('[\"]','',$word);
        $word = preg_replace('[value:]','',$word);
        $dbtags = explode(",", $word);

        $url = $_POST['url'];
        
        @$priority = $_POST['priority'];

        if($priority == NULL) {
            $priority = 0;
        } else {
            $priority = 1;
        }
        
        if ($textimage == NULL || $textimage == '') {
            
            $this->model->update_article($numart, $title, $stitle, $desc, $date, $d, $devent, $fechaFija, $url, $priority);

            $this->model->delete_tagsArticle($numart);

            for ($i = 0; $i < count($dbtags); $i++) {
                $this->model->insert_tagArticle($numart, $dbtags[$i]);
            }

        } else {
            $file_name =$_FILES['image']['name'];
            $file_type =$_FILES['image']['type'];
            $file_size =$_FILES['image']['size'];

            $file_tmp =$_FILES['image']['tmp_name'];
            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
            move_uploaded_file($file_tmp, $imagen_destino.$file_name);

            $imagen_bd = '/2019/src/assets/media/image/' . $file_name;
            
            $this->model->update_articleWi($numart, $title, $stitle, $desc, $imagen_bd, $date, $d, $devent, $fechaFija, $url, $priority);
            
            $this->model->delete_tagsArticle($numart);

            for ($i = 0; $i < count($dbtags); $i++) {
                $this->model->insert_tagArticle($numart, $dbtags[$i]);
            }
        }
        
        
        sleep(1);
        echo("<script>location.href = '" . FOLDER_PATH . "/admin/news';</script>");

    } else {

        $this->model2 = new adminModel();
        $this->BellNtf = $this->model2->BellNotifications();
        $this->datos_articulo_edit = $this->model->mostrar_articulo($dato);
        //$this->datos_articulo = $this->datos_articulo_edit->fetch_array();
        
        $this->AdminView('admin/news/edit/edit', [
            'nombre' => $this->datos_org['nombre'], 
            'apellido' => $this->datos_org['apellido'], 
            'rol' => $this->datos_org['rol'],
            'fotoUsu' => $this->datos_org['fotoUsu'],
            'BellNtf' => $this->BellNtf, 
            'numArt' => $dato, 
            'datos_articulo_edit' => $this->datos_articulo_edit
        ]);
    }

} else if($link == 'save') {
    $numart = $_POST['numart'];
    $title = $_POST['title'];
    $stitle = $_POST['stitle'];
    $desc = $_POST['desc'];
        
    $file_name =$_FILES['image']['name'];
    $file_type =$_FILES['image']['type'];
    $file_size =$_FILES['image']['size'];

    $file_tmp =$_FILES['image']['tmp_name'];
    $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
    move_uploaded_file($file_tmp, $imagen_destino.$file_name);

    $imagen_bd = '/2019/src/assets/media/image/' . $file_name;

    $date = $_POST['date'];
    $d = $_POST['d'];  // duration o vencimiento
    $devent = $_POST['devent']; // fecha de evento
    @$fechaFija = $_POST['fechaFija'];

    if($fechaFija == NULL) {
        $fechaFija = 0;
    } else {
        $fechaFija = 1;
    }

    $tags = $_POST['tags'];
    $word = preg_replace('[\]]','',$tags);
    $word = preg_replace('[\[]','',$word);
    $word = preg_replace('[\{]','',$word);
    $word = preg_replace('[\}]','',$word);
    $word = preg_replace('[\"]','',$word);
    $word = preg_replace('[value:]','',$word);
    $dbtags = explode(",", $word);
            
    $url = $_POST['url'];
        
    @$priority = $_POST['priority'];

    if($priority == NULL) {
        $priority = 0;
    } else {
        $priority = 1;
    }
    
    $encapsuArticle = new articulo($numart, $title, $stitle, $desc, $imagen_bd, 
                                        $date, $d, $devent, $fechaFija, $url, $priority);
        
    $this->model->insert_article($encapsuArticle);

    for ($i = 0; $i < count($dbtags); $i++) {
        $this->model->insert_tagArticle($numart, $dbtags[$i]);
    }

    sleep(1);
    echo("<script>location.href = '" . FOLDER_PATH . "/admin/news';</script>");
    
}