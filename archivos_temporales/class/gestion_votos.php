<?PHP
	class gestion_votos{
		function votos_total_clasificacion($mysqli){
			$query_clasificacion_uno = "select count(pvc.id_propuesta_votacion_ciudadano) as votos from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_temas as st on pst.id_subtema = st.id_sub_tema where st.id_tema = ? and pvc.votacion = '0'";
			if ($stmt = $mysqli->prepare($query_clasificacion_uno)){

				$id_clasificacion = 1;
				
				//Asigna las variables para el query
				$stmt->bind_param("i",$id_clasificacion);

				//Ejecuta el query
				$stmt->execute();
				
				
				
				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion_uno);

				//obtener valor
				while ($stmt->fetch()){

				}
				
				//Cierra el query
				$stmt->close();
			}
			
			$query_clasificacion_dos = "select count(pvc.id_propuesta_votacion_ciudadano) as votos from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_temas as st on pst.id_subtema = st.id_sub_tema where st.id_tema = ? and pvc.votacion = '0'";
			if ($stmt = $mysqli->prepare($query_clasificacion_dos)){

				$id_clasificacion = 2;
				
				//Asigna las variables para el query
				$stmt->bind_param("i",$id_clasificacion);

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion_dos);
				
				//obtener valor
				while ($stmt->fetch()){

				}

				//Cierra el query
				$stmt->close();
			}
			
			$query_clasificacion_tres = "select count(pvc.id_propuesta_votacion_ciudadano) as votos from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_temas as st on pst.id_subtema = st.id_sub_tema where st.id_tema = ? and pvc.votacion = '0'";
			if ($stmt = $mysqli->prepare($query_clasificacion_tres)){

				$id_clasificacion = 3;
				
				//Asigna las variables para el query
				$stmt->bind_param("i",$id_clasificacion);

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion_tres);
				
				//obtener valor
				while ($stmt->fetch()){

				}

				//Cierra el query
				$stmt->close();
			}
			
			$query_clasificacion_cuatro = "select count(pvc.id_propuesta_votacion_ciudadano) as votos from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_temas as st on pst.id_subtema = st.id_sub_tema where st.id_tema = ? and pvc.votacion = '0'";
			if ($stmt = $mysqli->prepare($query_clasificacion_cuatro)){

				$id_clasificacion = 4;
				
				//Asigna las variables para el query
				$stmt->bind_param("i",$id_clasificacion);

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion_cuatro);
				
				//obtener valor
				while ($stmt->fetch()){

				}

				//Cierra el query
				$stmt->close();
				
				
			}
			
			$cadena_votos = Array("voto_uno"=>$votos_clasificacion_uno,"voto_dos"=>$votos_clasificacion_dos,"voto_tres"=>$votos_clasificacion_tres,"voto_cuatro"=>$votos_clasificacion_cuatro);
			
			return ($cadena_votos);
		}
		
		function votos_por_subclasificacion($mysqli,$id_clasificacion){
			$cadena_votos_clasificacion = array();
			
			$query = "select count(pvc.id_propuesta_votacion_ciudadano) as votos,st.sub_tema from propuesta_subtema as pst join propuesta_votacion_ciudadano as pvc on pst.id_propuesta = pvc.id_propuesta join sub_temas as st on pst.id_subtema = st.id_sub_tema where st.id_tema = ? and pvc.votacion = '0' group by st.id_sub_tema";
			if ($stmt = $mysqli->prepare($query)){

				//Asigna las variables para el query
				$stmt->bind_param("i",$id_clasificacion);

				//Ejecuta el query
				$stmt->execute();

				//Asigna el resultado a una variable
				$stmt->bind_result($votos_clasificacion,$nombre_sub_tema);
				
				//obtener valor
				while ($stmt->fetch()){
					$cadena_votos_clasificacion[] = Array(
						"id_clasificacion" => $id_clasificacion,
						"nombre_sub_tema" => $nombre_sub_tema,
						"voto_total" => $votos_clasificacion
					);
				}

				//Cierra el query
				$stmt->close();
			}
			return($cadena_votos_clasificacion);
		}
	}
?>