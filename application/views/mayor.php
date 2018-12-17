<h2>Dueños con cedula mayor a 3000000</h2>
	<br />
	<br />
	<table class="table table-hover">
			<tr>
			<td><strong>cedula</strong></td>
			<td><strong>Nombre</strong></td>
			
		</tr>
		
		<?php
			if($informacion != false){
			foreach($informacion as $row){ ?>
			<tr>	
				<td><?php echo $row->cedula;?></td>
				<td><?php echo $row->nombre;?></a></td>
				
			</tr>
			
			<?php } }
		?>

	</table>
	
	<br />
	<a href= "<?php echo base_url();?>index.php/controlCasas"> volver al inicio</a><br/>
	<br />
	<br />