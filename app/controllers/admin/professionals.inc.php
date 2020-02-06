<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    	
*/


$this->dataProfesional = new dataAdmin();

if ($link == ''){

$this->model2 = new adminModel();
$this->BellNtf = $this->model2->BellNotifications();
$this->datos_profesional = $this->dataProfesional->mostrarTablaProfesional();

$this->AdminView('admin/professionals/professionals',[
    'nombre'    => $this->datos_org['nombre'], 
    'apellido'  => $this->datos_org['apellido'], 
    'rol'       => $this->datos_org['rol'], 
    'fotoUsu' => $this->datos_org['fotoUsu'], 
    'BellNtf' => $this->BellNtf, 
    'datos_profesional' => $this->datos_profesional
]);
    
} elseif($link == 'save') {
    //insertamos el profesional
    $firstName = strtoupper($_POST['firstName']);
    $lastName = strtoupper($_POST['lastName']);
    $dni = $_POST['dni'];
    $contact_point = $_POST['contact_point'];
    $email = $_POST['email'];
    $qr = $_POST['qr'];
    $grade = $_POST['grade']; 
    $city = $_POST['city'];
    $country = $_POST['country'];
        
    $encapsuProfesional = new profesional($firstName,$lastName,$dni,$contact_point,$email,$qr,$grade,$city,$country);
        
    $this->dataProfesional->guardarProfesional($encapsuProfesional);
        
    
    sleep(1);
    $nombre = $firstName . ' ' . $lastName;
	$nombre = base64_encode(utf8_encode($nombre));
    echo("<script>location.href = '" . FOLDER_PATH . "/admin/inscriptions?tp=_p&nm=" . $nombre . "';</script>");

}elseif ($link == 'edit' ) {
     # editamos el profesional segun el dato que pase como parámetro
    @$update = $_POST['update'];
    if($update == "true"){
        $numPro = $_POST['numPro'];
        $firstName = strtoupper($_POST['firstName']);
        $lastName = strtoupper($_POST['lastName']);
        $dni = $_POST['dni'];
        $contact_point = $_POST['contact_point'];
        $email = $_POST['email'];
        $qr = $_POST['qr'];
        $grade = $_POST['grade']; 
        $city = $_POST['city'];
        $country = $_POST['country'];

        $encapsuProfesional = new profesional($firstName, $lastName, $dni, $contact_point, 
            $email, $qr, $grade, $city, $country);
        
        $this->dataProfesional->actualizarProfesional($encapsuProfesional, $numPro);
        
        sleep(1);
        echo("<script>location.href = '" . FOLDER_PATH . "/admin/professionals';</script>");
        
    }
    else {
        
        $this->model2 = new adminModel();
        $this->BellNtf = $this->model2->BellNotifications();
        $this->datos_profesional_edit = $this->dataProfesional->mostrarEditarProfesional($dato);

        $this->AdminView('admin/professionals/edit/edit', [ 
            'nombre'    => $this->datos_org['nombre'], 
            'apellido'  => $this->datos_org['apellido'], 
            'rol'       => $this->datos_org['rol'], 
            'fotoUsu' => $this->datos_org['fotoUsu'], 
            'BellNtf' => $this->BellNtf, 
            'numPro'=> $dato, 
            'datos_profesional_edit' => $this->datos_profesional_edit
        ]);
    }                 
} else if ($link == 'delete') {
    
    $this->dataProfesional->eliminarProfesional($dato);
    sleep(1);
    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/professionals';</script>");

}