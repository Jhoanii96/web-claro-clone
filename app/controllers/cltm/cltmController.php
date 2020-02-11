<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

require ROOT . FOLDER_PATH . "/app/models/cltm/cltmModel.php";
require ROOT . FOLDER_PATH . "/app/.paket/simple_html_dom.php";

class cltm extends Controller
{
    public $model;

    public function index()
    {

        if (isset($_GET['page'])) {
            $num_flang = $_GET['page'];
        } else {
            $num_flang = 1;
        }

        if (isset($_POST['dni'])) {
            if (strlen($_POST['dni']) == 8) {
                /* $consulta = file_get_html('https://eldni.com/buscar-por-dni?dni=' . $_POST['dni']);
                $datosnombres = array();
                foreach ($consulta->find('td') as $header) {
                    $datosnombres[] = $header->plaintext;
                }
                if (!isset($datosnombres)) {
                    $this->message = 'El DNI ingresado no existe, porfavor vuelva a rellenar el formulario.';
                    $this->view('home/home' . $num_flang, [
                        'message' => $this->message, 
                        'flang_active' => $num_flang
                    ]);
                    return;
                }
                $datos = array(
                    0 => $_POST['dni'],
                    1 => $datosnombres[0],
                    2 => $datosnombres[1],
                    3 => $datosnombres[2],
                ); */
                $data_dni = $_POST['dni'];
            } else {
                $this->message = 'Error ingresado en el DNI, porfavor vuelva a rellenar el formulario.';
                $this->view('home/home' . $num_flang, [
                    'message' => $this->message, 
                    'flang_active' => $num_flang
                ]);
                return;
            }
            
            /* if (isset($datos[1])) {
                $data_name = $datos[1];
            } else {
                $data_name = '';
            }

            if (isset($datos[2])) {
                $data_apellido_p = $datos[2];
            } else {
                $data_name = '';
            }

            if (isset($datos[3])) {
                $data_apellido_m = $datos[3];
            } else {
                $data_name = '';
            }    */         
            
        } else {
            $this->message = 'Formulario incompleto, porfavor vuelva a marcar rellenar.';
            $this->view('home/home' . $num_flang, [
                'message' => $this->message, 
                'flang_active' => $num_flang
            ]);
            return;
        }
        if (isset($_POST['num'])) {
            $data_num = $_POST['num'];
        } else {
            $this->message = 'Formulario incompleto, porfavor vuelva a marcar rellenar.';
            $this->view('home/home' . $num_flang, [
                'message' => $this->message, 
                'flang_active' => $num_flang
            ]);
            return;
        }
        if (!isset($_POST['chk'])) {
            $this->message = 'Formulario incompleto, porfavor vuelva a marcar rellenar.';
            $this->view('home/home' . $num_flang, [
                'message' => $this->message, 
                'flang_active' => $num_flang
            ]);
            return;
        }

        $this->model = new cltmModel();
        /* $this->model->registrar_cliente($data_dni, $data_num, $data_name, $data_apellido_p, $data_apellido_m); */
        $this->model->registrar_cliente($data_dni, $data_num);

        $this->message = 'Gracias por su confianza, en instantes nuestro asistente le atenderá gratamente.';

        $this->view('home/home' . $num_flang, [
            'message' => $this->message, 
            'flang_active' => $num_flang
        ]);

    }
}
