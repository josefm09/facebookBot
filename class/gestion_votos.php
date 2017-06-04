<?PHP
	class gestion_votos{
		function votos_total_clasificacion($mysqli){
			$query_clasificacion_uno = "select count(pvc.id_propuesta_votacion_ciudadano) as votos from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_tema as st on pst.id_subtema = st.id_subtema where st.id_tema = '1' and pvc.votacion = '1'";
			if ($stmt = $mysqli->prepare($query_clasificacion_uno)){

				//Asigna las variables para el query
				$stmt->bind_param();

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion_uno);

				//Cierra el query
				$stmt->close();
			}
			
			$query_clasificacion_dos = "select count(pvc.id_propuesta_votacion_ciudadano) as votos from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_tema as st on pst.id_subtema = st.id_subtema where st.id_tema = '2' and pvc.votacion = '1'";
			if ($stmt = $mysqli->prepare($query_clasificacion_dos)){

				//Asigna las variables para el query
				$stmt->bind_param();

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion_dos);

				//Cierra el query
				$stmt->close();
			}
			
			$query_clasificacion_tres = "select count(pvc.id_propuesta_votacion_ciudadano) as votos from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_tema as st on pst.id_subtema = st.id_subtema where st.id_tema = '3' and pvc.votacion = '1'";
			if ($stmt = $mysqli->prepare($query_clasificacion_tres)){

				//Asigna las variables para el query
				$stmt->bind_param();

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion_tres);

				//Cierra el query
				$stmt->close();
			}
			
			$query_clasificacion_cuatro = "select count(pvc.id_propuesta_votacion_ciudadano) as votos from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_tema as st on pst.id_subtema = st.id_subtema where st.id_tema = '4' and pvc.votacion = '1'";
			if ($stmt = $mysqli->prepare($query_clasificacion_cuatro)){

				//Asigna las variables para el query
				$stmt->bind_param();

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion_cuatro);

				//Cierra el query
				$stmt->close();
			}
			
			$cadena_votos = Array("voto_uno"=>$votos_clasificacion_uno,"voto_dos"=>$votos_clasificacion_dos,"voto_tres"=>$votos_clasificacion_tres,"voto_cuatro"=>$votos_clasificacion_cuatro)
			
			return ($cadena_votos);
		}
		
		function votos_por_subclasificacion($mysqli,$id_clasificacion){
			$cadena_votos = array();
			
			$query = "select count(pvc.id_propuesta_votacion_ciudadano) as votos,sub_tema from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_tema as st on pst.id_subtema = st.id_subtema where st.id_tema = '?' and pvc.votacion = '1' group by st.id_tema";
			if ($stmt = $mysqli->prepare($query_clasificacion_uno)){

				//Asigna las variables para el query
				$stmt->bind_param("i",$id_clasificacion);

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion,$nombre_sub_tema);
				
				//obtener valor
				while ($stmt->fetch()){
					$cadena_votos[] = (
						"id_clasificacion"=>$id_clasificacion
						"nombre_sub_tema"=>$nombre_sub_tema,
						"voto_total"=>$votos_clasificacion
					)
				}

				//Cierra el query
				$stmt->close();
			}
			return($cadena_votos);
		}
	}
?>