<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Envio_email_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}
	
	//realizamos la inserci�n de los datos y devolvemos el 
	//resultado al controlador para env�ar el correo si todo ha ido bien
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
    function sendMailPedido($email,$pedido)
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
        
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('llibroweb@gmail.com');
        $this->email->to($email);
        $this->email->subject('Datos del pedido realizado. Lé llibrosweb');
        $this->email->message('<h3>Confirmación del pedido número: '.$pedido.'</h3><hr><br> '            
                . 'Visitanos en http://iessansebastian.com/alumnos/2daw1516/domingo/Tienda/ <br>'
                . '<b>Este correo ha sido generado automáticamente por favor no respenda a este correo.</b>');
        $this->email->send();
        //con esto podemos ver el resultado
       // var_dump($this->email->print_debugger());
    }
    
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
                . 'Visitanos en http://iessansebastian.com/alumnos/2daw1516/domingo/Tienda/ <br>'
                . '<b>Este correo ha sido generado automáticamente por favor no respenda a este correo.</b>');
        $this->email->send();
        //con esto podemos ver el resultado
       // var_dump($this->email->print_debugger());
    }
    
    
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