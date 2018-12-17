<?php


class ModelVacas extends CI_Model{
	
	public function ingresarVacas(){   // agregar casa (setCasas)
		$data = array(
			'codigo_vaca' => $this->input->post('codigo_vaca'),
			'peso_vivo' => $this->input->post('peso_vivo'),
			'leche_producida' => $this->input->post('leche_producida'),
			'horas_trabajo_dia' => $this->input->post('horas_trabajo_dia'),
			'contenido_graso' => $this->input->post('contenido_graso'),
			'estado_preñez' => $this->input->post('estado_preñez'),
			'porcentaje_digestibilidad' => $this->input->post('porcentaje_digestibilidad'),
			'energia_neta_mantenimiento' => $this->input->post('energia_neta_mantenimiento'),
			'energia_neta_actividad' => $this->input->post('energia_neta_actividad'),
			'energia_neta_lactancia' => $this->input->post('energia_neta_lactancia'),
			'energia_neta_trabajo' => $this->input->post('energia_neta_trabajo'),
			'energia_neta_preñez' => $this->input->post('energia_neta_preñez'),
			'cmst' => $this->input->post('cmst'),
		);
		return $this->db->insert('vacas',$data); 
	}

	public function listarVacas(){        //listarViviendas
		$query = $this->db->get('vacas');		
		if($query->num_rows()>0){
			return $query;
			}else{
				return FALSE;
			}		
	}
	
}
?>