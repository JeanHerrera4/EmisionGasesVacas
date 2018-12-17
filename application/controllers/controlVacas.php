<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controlVacas extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('main');

	}

	public function ingresarVacas() //setCasas
	{
		$this->load->database("default");
		$this->load->helper('form');				//recibir datos del formulario
		$this->load->library('form_validation');  // validar datos

		// Ingresados
		$this->form_validation->set_rules('codigo_vaca', 'codigo_vaca','required');
		$this->form_validation->set_rules('peso_vivo', 'peso_vivo','required');
		$this->form_validation->set_rules('leche_producida', 'leche_producida','required');
		$this->form_validation->set_rules('horas_trabajo_dia', 'horas_trabajo_dia');
		$this->form_validation->set_rules('contenido_graso', 'contenido_graso','required');
		$this->form_validation->set_rules('estado_preñez', 'estado_preñez');

		//Calculados
		$this->form_validation->set_rules('porcentaje_digestibilidad', 'porcentaje_digestibilidad','required');
		$this->form_validation->set_rules('energia_neta_mantenimiento', 'energia_neta_mantenimiento','required');
		$this->form_validation->set_rules('energia_neta_actividad', 'energia_neta_actividad','required');
		$this->form_validation->set_rules('energia_neta_lactancia', 'energia_neta_lactancia','required');
		$this->form_validation->set_rules('energia_neta_trabajo', 'energia_neta_trabajo');
		$this->form_validation->set_rules('energia_neta_preñez', 'energia_neta_preñez');
		$this->form_validation->set_rules('cmst', 'cmst','required');

		if($this->form_validation->run() == false){
			
			$this->load->view('header');
			$this->load->view('agregarVaca'); // se carga la vista con el validation 
			$this->load->view('footer');
		}
		else{
			$this->load->model('modelVacas');  // cargar el modelo (modelCasas)
			$this->modelVacas->ingresarVacas();  // cargar el metodo que hay en modelo
			$this->load->view('header');
			$this->load->view('exito');
			$this->load->view('footer');
		}
	}

	public function listarVacas(){ //listarViviendas
		$this->load->model('modelVacas');
		$data = array('informacion' => $this->modelVacas->listarVacas()); //listarViviendas
			
			$this->load->view('header');	
			$this->load->view('listarVacas',$data);  
			$this->load->view('footer');
		}

	/*public function hacerCalculo(){
		$this->load->model('modelVacas');
		$data array('informacion' => $this->modelVacas->hacerCalculos());

	}*/

	public function mayor(){
			$this->load->model('modelCasas');
			$data = array ('informacion' => $this->modelCasas->mayores());
			$this->load->view('header');
			$this->load->view('mayor',$data);
	}
}
?>