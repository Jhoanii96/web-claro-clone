<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
    MODIFICACIONES Y COLABORACIONES:
    LEANDRO ANDRÉ RAMOS VALDEZ
    JOSUE ALDAIR MAMANI CARIAPAZA
	
*/


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT . FOLDER_PATH . "/app/Phpmailer/Exception.php";
require ROOT . FOLDER_PATH . "/app/Phpmailer/PHPMailer.php";
require ROOT . FOLDER_PATH . "/app/Phpmailer/SMTP.php";

$this->dataPreins = new dataAdmin();
if ($link == '') {

    $this->model2 = new adminModel();
    $this->BellNtf = $this->model2->BellNotifications();
    $this->datos_preinscripciones = $this->dataPreins->mostrarTablaPreinscripcion();

    $this->AdminView('admin/preinscriptions/preinscriptions', [
        'nombre' => $this->datos_org['nombre'],
        'apellido' => $this->datos_org['apellido'],
        'rol' => $this->datos_org['rol'],
        'fotoUsu' => $this->datos_org['fotoUsu'],
        'BellNtf' => $this->BellNtf,
        'preinscripciones' => $this->datos_preinscripciones
    ]);
} else if ($link == 'accept') {

    $this->dataPreins = new dataAdmin();
    $this->dataPreins->aceptarPreinscripcion($dato);

    /* ---- FILE CREATE JSON ---- */

    $this->data_json = new dataAdmin();
    $this->parametro1 = $this->data_json->getDatainscriptions();

    $this->data_for_json = array();
    while ($row_json = $this->parametro1->fetch_assoc()) {

        $this->data_for_json[] = array(
            'codigo'        => $row_json['codigo'],
            'nombres'       => $row_json['nombres'],
            'apellidos'     => $row_json['apellidos']
        );
    }

    $this->data_json = json_encode($this->data_for_json, JSON_UNESCAPED_UNICODE);
    file_put_contents(ROOT . FOLDER_PATH . '/src/data/inscripcion.json', $this->data_json, LOCK_EX);

    /* ---- PHPMAILER ---- */

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $nombre = utf8_decode(base64_decode($name));

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com;smtp.live.com;';        // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ciistacna@gmail.com';               // SMTP username
        $mail->Password   = 'EsisCiis.2019';                        // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ciistacna@gmail.com', 'XX CIIS');
        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Registro de Inscripcion CIIS 2019';
        $mail->Body    = '
            
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="EditorVersion" content="1.0">
    <style type="text/css">
        .moduloTexto img {
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            padding-left: 0px !important;
            padding-right: 15px !important;
        }

        p {
            margin: 10px 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            display: block;
            margin: 0;
            padding: 0;
        }

        img,
        a img {
            border: 0;
            height: auto;
            outline: none;
            text-decoration: none;
            max-width: 100%;
        }

        body {
            margin: 0;
            padding: 0;
        }

        #outlook a {
            padding: 0;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        p,
        a,
        li,
        td,
        blockquote {
            mso-line-height-rule: exactly;
        }

        a[href^=tel],
        a[href^=sms] {
            color: inherit;
            cursor: default;
            text-decoration: none;
        }

        p,
        a,
        li,
        td,
        body,
        table,
        blockquote {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass td,
        .ExternalClass div,
        .ExternalClass span,
        .ExternalClass font {
            line-height: 100%;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        h1,
        h1 * {
            color: #666666;
            font-family: Helvetica;
            font-size: 26px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }

        h2,
        h2 * {
            color: #202020;
            font-family: Helvetica;
            font-size: 22px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }

        h3,
        h3 * {
            color: #202020;
            font-family: Helvetica;
            font-size: 20px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }

        h4,
        h4 * {
            color: #202020;
            font-family: Helvetica;
            font-size: 18px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }

        a {
            text-decoration: none;
        }

        body,
        #teExternalBody {
            background-color: #eeeeee;
            height: 100%;
            width: 100%;
        }


        td.teExternalBody {
            padding-top: 20px;
            padding-bottom: 20px;
        }


        td.moduloTexto,
        #teExternalBody {
            color: #333333;
            font-family: Helvetica;
            font-size: 14px;
            font-style: normal;
            font-weight: normal;
            letter-spacing: normal;
        }

        p,
        div,
        span {
            line-height: normal;
        }

        #teInternalBody {
            max-width: 650px !important;
            border-style: none;
            border-color: #666666;
            border-width: 0px;
            border-radius: 0px;
            background-color: #ffffff;
            border-collapse: separate;
        }

        td.teInternalBody {
            padding-top: 20px;
            padding-bottom: 0;
            padding-left: 20px;
            padding-right: 20px;
        }

        td.moduloTexto {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }

        @media only screen and (max-width: 480px) {

            img.te-responsive,
            .video img {
                width: 100% !important;
            }

            #body-text {
                font-size: 12px;
            }

            #footer-text {
                font-size: 12px;
            }

            img {
                max-width: 100%;
            }

            h1,
            h1 * {
                font-size: 22px !important;
                line-height: 125% !important;
            }

            h2,
            h2 * {
                font-size: 20px !important;
                line-height: 125% !important;
            }

            h3,
            h3 * {
                font-size: 18px !important;
                line-height: 125% !important;
            }

            h4,
            h4 * {
                font-size: 16px !important;
                line-height: 150% !important;
            }

            .columnWrapper,
            .columnWrapper .sortable-module,
            table.contenedorbasepie,
            table.contenedorbasecabecera {
                display: block;
                float: left;
                width: 100% !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

        }

        td.column100 {
            padding-top: 0;
            padding-bottom: 20px;
            padding-left: 0;
            padding-right: 0;
            background-color: transparent;
        }

        tr[class*="1col"] table.templateColumns {
            border-spacing: 0;
            border-collapse: separate !important;
            border-style: none;
        }

        table.templateColumns {
            background-color: #ffffff;
        }

        .teRelative {
            border-width: 0;
            border-collapse: collapse;
            border-style: none;
            border-color: #CCCCCC;
        }

        td.templateColumns {
            padding-top: 0;
            padding-bottom: 0;
            padding-left: 0;
            padding-right: 0;
        }

        td.alignImage {
            text-align: center;
        }

        td.moduloTexto {
            border-width: 0px;
            border-collapse: collapse;
            border-style: none;
            border-color: #cccccc;
            background-color: transparent;
        }
    </style>
</head>

<body>
    <center>
        <table id="teExternalBody" align="center" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td class="teExternalBody" align="center" valign="top">
                        <table id="teInternalBody" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="teInternalBody">
                                        <table id="teContainerBody" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody te-draggablecontainer="" class="ui-sortable" style="">

                                                <tr class="1col finalmodule" te-draggable="" te-repeatable="" style="">
                                                    <td class="teRelative">


                                                        <table class="templateColumns templateColumns100" style="border-width:0;border-color:inherit;background-color:inherit;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="templateColumns" width="100%" valign="top">
                                                                        <table style="width:100%;" align="center" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="columnWrapper column100 sortable-module ui-sortable" align="center" valign="top">

                                                                                        <div class="image finalelement" te-draggable="" te-repeatable="">


                                                                                            <table data-responsive="true" data-resize="false" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="alignImage" style="line-height: 0 !important;" width="100%" valign="middle">
                                                                                                            <img te-edit="left_column_image" class="columnImage te-responsive" alt="" src="https://mastervirt1.teenvio.com/v3/uploads/ciistacna/gestor-imagenes/final_56871571259702.jpg?rnd=1571259706678" style="" width="608" height="170" data-height="170px">
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr class="1col finalmodule" te-draggable="" te-repeatable="" style="">
                                                    <td class="teRelative">


                                                        <table class="templateColumns templateColumns100" style="border-width:0;border-color:inherit;background-color:inherit;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="templateColumns" width="100%" valign="top">
                                                                        <table style="width:100%;" align="center" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="columnWrapper column100 sortable-module ui-sortable" align="center" valign="top">


                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr class="1col finalmodule" te-draggable="" te-repeatable="" style="">
                                                    <td class="teRelative">


                                                        <table class="templateColumns templateColumns100" style="border-width:0;border-color:inherit;background-color:inherit;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="templateColumns" width="100%" valign="top">
                                                                        <table style="width:100%;" align="center" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="columnWrapper column100 sortable-module ui-sortable" align="center" valign="top">


                                                                                        <div class="text finalelement" te-draggable="" te-repeatable="">


                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td id="body-text" style="padding: 0px;" te-edit="" class="moduloTexto" width="100%">
                                                                                                            <h1 style="">¡Gracias, ' . $nombre . '!</h1>
                                                                                                            <div>&nbsp;</div>
                                                                                                            <div>Estimado asistente al XX Congreso Internacional de Informática y Sistemas.</div>
                                                                                                            <div>&nbsp;</div>
                                                                                                            <div>Ahora eres parte de la experiencia CIIS, tu proceso de inscripción ha finalizado correctamente.</div>
                                                                                                            <div>&nbsp;</div>
                                                                                                            <div>Accede a los detalles del evento en nuestro sitio web: &nbsp;<a href="http://ciistacna.com/2019/" target="_blank">www.ciistacna.com</a></div>
                                                                                                            <div>&nbsp;</div>
                                                                                                            <div>El dia 11 de noviembre puede acercarse al auditorio Juan Figueroa Salgado - sede Los Granados - UNJBG, para recoger su credencial e instrumentos.</div>
                                                                                                            <div>&nbsp;</div>
                                                                                                            <div>Para mayores detalles no dude en contactarnos.</div>
                                                                                                            <div>&nbsp;</div>
                                                                                                            <div>
                                                                                                                <h3>Atención:</h3> 
                                                                                                                <li>Si aún no ha realizado el pago correspondiente, le invitamos a realizar la inscripción nuevamente y adjuntar el comprobante de pago. En caso contrario, no tome en cuenta este último mensaje.</li>
                                                                                                                <li>No olvide llevar su comprobante de pago a la hora de ingresar.</li>
                                                                                                            </div>
                                                                                                            <div>&nbsp;</div>
                                                                                                        </td>

                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <div class="text finalelement" te-draggable="" te-repeatable="">


                                                                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td id="footer-text" width="100%" style="background-color: none;" te-edit="" class="moduloTexto" align="center">
                                                                                                            <div>_______________________________________________</div>
                                                                                                            <div>&nbsp;</div>
                                                                                                            <div>Telf. +51 (052) 528000 anexo 2005&nbsp;| Cel. +51 971 243 797&nbsp;</div>
                                                                                                            <div>&nbsp;</div>
                                                                                                    </tr>


                                                                                                    <div align="center" bottom="middle">
                                                                                                        <tr align="center" bottom="middle">

                                                                                                            <td align="center" bottom="middle">
                                                                                                                <a href="https://www.facebook.com/ciistacna" target="_blank"><img src="http://www.ofertoldo.com/wp-content/uploads/2011/09/LOGO-fb.png" width="25" height="25" style="width: 21px;padding-bottom: 2px;" /></a>

                                                                                                                <a href="https://www.youtube.com/user/ciistacna" target="_blank"><img src="https://i.pinimg.com/originals/de/1c/91/de1c91788be0d791135736995109272a.png" width="25" height="25" /></a>

                                                                                                                <a href="https://ciistacna.com/2019/" target="_blank"><img src="https://scontent.ftcq1-1.fna.fbcdn.net/v/t1.0-9/49213040_2150474188378498_2669784385959493632_n.png?_nc_cat=110&_nc_eui2=AeEVfG9-nfKeSlxIImijk2vbdn58Bq5oV3F7rrPpvYPRwZCqdkGlYzMWfsDY8RHaEEuFTtl4iOWlJUnUklKiSyK3So4vYrdpedV_qT9Z4bPASg&_nc_oc=AQn6yihJPkcc3csHfahq5zhbg4OnaeXOAx3O0KcpytciKi3sEQ2pMJtAYDvZacK9HkJDsKIytjE9jn-3I8ShHOpO&_nc_ht=scontent.ftcq1-1.fna&oh=de62f7b8304e6d4a22e422ed6101ebff&oe=5E2A1AE9" width="25" height="25" /></a>

                                                                                                                <a href="https://www.flickr.com/photos/160684070@N02/albums" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Flickr.svg/1024px-Flickr.svg.png" width="25" height="25" /></a>

                                                                                                                <a href="https://wa.me/51971243797" target="_blank"><img src="http://www.dacoromania.org/upload/o/131/1317479_icono-de-whatsapp-png.png" width="25" height="25" /></a>

                                                                                                                <a href="m.me/ciistacna" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Facebook_Messenger_4_Logo.svg/1200px-Facebook_Messenger_4_Logo.svg.png" width="25" height="25" style="width: 21px;padding-bottom: 3px;" /></a>
                                                                                                            </td>

                                                                                                        </tr>

                                                                                                    </div>

                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>
        ';

        $mail->send();
        echo 'El usuario se ha inscrito y el mensaje de confirmación ha sido enviada...';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    sleep(1);

    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/preinscriptions';</script>");
} else if ($link == 'decline') {

    $this->dataPreins = new dataAdmin();
    $this->dataPreins->denegarPreinscripcion($dato);

    /* ---- FILE CREATE JSON ---- */

    $this->parametro1 = $this->dataPreins->getDatainscriptions();

    $this->data_for_json = array();
    while ($row_json = $this->parametro1->fetch_assoc()) {

        $this->data_for_json[] = array(
            'codigo'        => $row_json['codigo'],
            'nombres'       => $row_json['nombres'],
            'apellidos'     => $row_json['apellidos']
        );
    }

    $this->data_json = json_encode($this->data_for_json, JSON_UNESCAPED_UNICODE);
    file_put_contents(ROOT . FOLDER_PATH . '/src/data/inscripcion.json', $this->data_json, LOCK_EX);

    sleep(1);
    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/preinscriptions';</script>");
} elseif ($link == 'show') {

    $this->dataPreins = new dataAdmin();
    $this->model2 = new adminModel();
    $this->BellNtf = $this->model2->BellNotifications();
    $this->datosShow_preinscripcion = $this->dataPreins->mostrarShowPreinscripcion($dato);

    $this->AdminView('admin/preinscriptions/show/show', [
        'nombre' => $this->datos_org['nombre'],
        'apellido' => $this->datos_org['apellido'],
        'rol' => $this->datos_org['rol'],
        'fotoUsu' => $this->datos_org['fotoUsu'],
        'BellNtf' => $this->BellNtf,
        'numIns' => $dato,
        'datosShow_preinscripcion' => $this->datosShow_preinscripcion
    ]);
}
