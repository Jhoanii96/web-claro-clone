<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

require ROOT . FOLDER_PATH . "/app/models/cltm/cltmModel.php";
require ROOT . FOLDER_PATH . "/app/.paket/simple_html_dom.php";
require ROOT . FOLDER_PATH . '/vendor/autoload.php';

class cltm extends Controller
{
    public $model;

    public function index()
    {
        
        $options = array(
            'cluster' => 'mt1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '5f03dcb0303409e74fd6',
            '409189b3558e85699c89',
            '947052',
            $options
        );

        if (isset($_GET['page'])) {
            $num_flang = $_GET['page'];
        } else {
            $num_flang = 1;
        }

        if (isset($_POST['dni'])) {
            if (strlen($_POST['dni']) == 8) {
                $consulta = file_get_html('https://eldni.com/buscar-por-dni?dni=' . $_POST['dni']);
                $datosnombres = array();
                    
                foreach ($consulta->find('td') as $header) {
                    $datosnombres[] = $header->plaintext;
                }

                if ($datosnombres == null) {
                    $data_dni = $_POST['dni'];
                    $data_name = '';
                    $data_apellido_p = '';
                    $data_apellido_m = '';
                } else {
                    $datos = array(
                        0 => $_POST['dni'],
                        1 => $datosnombres[0],
                        2 => $datosnombres[1],
                        3 => $datosnombres[2],
                    );
                    
                    $data_dni = $_POST['dni'];
                    $data_name = $datos[1];
                    $data_apellido_p = $datos[2];
                    $data_apellido_m = $datos[3];
                }

                
            } else {
                echo 'Error ingresado en el DNI, porfavor vuelva a rellenar el formulario.';
                return;
            }
            
        } else {
            echo 'Formulario incompleto, porfavor vuelva a marcar rellenar.';
            return;
        }
        if (isset($_POST['num'])) {
            $data_num = $_POST['num'];
        } else {
            echo 'Formulario incompleto, porfavor vuelva a marcar rellenar.';
            return;
        }
        if (!isset($_POST['chk'])) {
            echo 'Formulario incompleto, porfavor vuelva a marcar rellenar.';
            return;
        }

        $this->model = new cltmModel();
        $this->model->registrar_cliente($data_dni, $data_num, $data_name, $data_apellido_p, $data_apellido_m);
        /* $this->model->registrar_cliente($data_dni, $data_num); */

        $this->ejecutivo = $this->model->obtener_ejecutivo_cliente($data_dni, $data_num);
        $data_ejecutivo = $this->ejecutivo->fetch();

        /* --- Pusher --- */
        $data['prinl'] = 'prl4';
        $data['ect'] = $data_ejecutivo[0];
        $data['msg'] = 'Se ha registrado un nuevo cliente con el número: ' . $data_num;
        $pusher->trigger('ejecutivo', 'principal', $data);
        /* - End Pusher - */
        
        echo 'Gracias por su confianza, en instantes nuestro asistente le atenderá gratamente.';

    }
}
