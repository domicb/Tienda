<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Envio_email_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}
	
        /**
         * Recoje todos los campos ya filtramos del formulario y los introduce en la tabla correspondiente
         * @param type $nombre
         * @param type $correo
         * @param type $nick
         * @param type $password
         * @param type $apellidos
         * @param type $direccion
         * @param type $cp
         * @param type $dni
         * @param type $provincia
         * @return type
         */
	function new_user($nombre,$correo,$nick,$password,$apellidos,$direccion,$cp,$dni,$provincia)
	{
            $ale = rand(1,8);
            $aleatorio = md5($ale);
            $data = array(
                 'idusuario' => null,
                 'provincia' => $provincia,
                 'username' => $nick,
                 'password' => $password,
                 'dni' => $dni,
                 'email' => $correo,          
                 'nombre' => $nombre,
                 'apellidos' => $apellidos,
                 'direccion' => $direccion,
                 'cp' => $cp,
                 'estado' => null,
                 'aleatorio' => $aleatorio

             );
             return $this->db->insert('usuario', $data);	
    }
    /**
     * Envia el email con los datos del pedido
     * @param type $email
     * @param type $usuario
     * @param type $pedido
     */
    function sendMailPedido($email,$usuario,$pedido)
    {
         //cargamos la libreria email de ci
        $this->load->library("email");
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'llibroweb@gmail.com',
            'smtp_pass' => 'loleilo8',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        //transformamos el id en algo visible
        if($pedido['estado']==1){$estado = 'Pendiente';}else{$estado='anulado';}
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('llibroweb@gmail.com');
        $this->email->to($email);
        $this->email->subject('Datos del pedido realizado. Lé llibrosweb');
        $this->email->attach('Assets/img/'.$pedido['idpedido'].'pedido.pdf');
        $this->email->message('<h3>Confirmación del pedido número: '.$pedido['idpedido'].'</h3><hr><br> '
                . 'Hola '.$usuario['username'].' '.$usuario['apellidos'].'<br>'
                . '¡Muchas gracias por realizar tu pedido en Lé llibrosweb!<br>'
                . 'A continuación te mostramos todos los datos de tu compra. <br>'
                . '<table border="1"><tr><th>Email asociado</th><th>Estado</th><th>Fecha</th></tr>'   
                . '<tr><td>'.$pedido['email'].'</td><td>'.$estado.'</td><td>'.$pedido['fecha'].'</td>'
                . '</tr><tr><th colspan="3">El importe total del pedido es de: '.$pedido['importe']. '</th></tr></table><br>'
                . 'Para ver los detalles del pedido puede consultar el pdf adjuntado a este correo<br>'
                . 'También puede consultar los pedidos en nuestra web.<br>'
                . 'http://iessansebastian.com/alumnos/2daw1516/domingo/Tienda/ <br><hr>'
                . '<b>Este correo ha sido generado automáticamente por favor no respenda a este correo.</b>');
        $this->email->send();
        //con esto podemos ver el resultado
       // var_dump($this->email->print_debugger());
    }
    
    /**
     * envia el email de registro al usuario registrado
     * @param type $email
     * @param type $nombre
     */
    public function sendMailGmail($email,$nombre) {
        //cargamos la libreria email de ci
        $this->load->library("email");
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'llibroweb@gmail.com',
            'smtp_pass' => 'loleilo8',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('llibroweb@gmail.com');
        $this->email->to($email);
        $this->email->subject('Bienvenido/a a llibros.com');
        $this->email->message('<h1>Bienvenido a la tienda '.$nombre.'</h1><br><br><h3>Se ha registrado satisfactoriamente</h3><hr><br> '
                . 'Su correo de acceso es '.$email.'<br>Para cualquier duda no dude en consultarnos'
                . 'en la dirrecion llibroweb@gmail.com<br>'
                . 'Visitanos en '.base_url().'<br>'
                . '<b>Este correo ha sido generado automáticamente por favor no respenda a este correo.</b>');
        $this->email->send();
        //con esto podemos ver el resultado
       // var_dump($this->email->print_debugger());
    }
    
    /**
     * Envia el email de recuperacion
     * @param type $ema
     * @param type $aleatorio
     * @param type $id
     */
    public function sendMailRecu($ema,$aleatorio,$id) {
        //cargamos la libreria email de ci
        $this->load->library("email");
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'llibroweb@gmail.com',
            'smtp_pass' => 'loleilo8',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        
  
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('llibroweb@gmail.com');
        $this->email->to($ema);
        $this->email->subject('Recuperar contraseña llibros.com');
        $this->email->message('Hemos recibido una peticion de restauración para la contraseña<br>'
                . 'Si es correcto pulsa sobre el siguiente enlace <br>'.
                 base_url('index.php/Usuarios_ci/recuperar/'.$id.'/'.$aleatorio)
                . '<br>Para cualquier duda no dude en consultarnos '
                . 'en la dirrecion llibroweb@gmail.com<br>'
                . '<b>Este correo ha sido generado automáticamente por favor no respenda a este correo.</b>');
        $this->email->send();
        //con esto podemos ver el resultado
       // var_dump($this->email->print_debugger());
    }
}