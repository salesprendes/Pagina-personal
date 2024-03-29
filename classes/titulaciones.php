<?php
	namespace classes;
	use PDO;

	class titulaciones
	{
		private $id, $fecha_comienzo_estudios, $fecha_fin_estudios;
	    private $nombre_titulo, $nombre_centro_estudios, $poblacion_centro_estudios, $provincia_centro_estudios;
	    private $calificacion;

	    public function __construct($fecha_comienzo_estudios = null, $fecha_fin_estudios = null, $nombre_titulo = null, $nombre_centro_estudios = null, $poblacion_centro_estudios = null, $provincia_centro_estudios = null, $calificacion = null)
	    {
	        $this->id = null;
	        $this->fecha_comienzo_estudios = $fecha_comienzo_estudios;
	        $this->fecha_fin_estudios = $fecha_fin_estudios;
	        $this->nombre_titulo = $nombre_titulo;
	        $this->nombre_centro_estudios = $nombre_centro_estudios;
	        $this->poblacion_centro_estudios = $poblacion_centro_estudios;
	        $this->provincia_centro_estudios = $provincia_centro_estudios;
	        $this->calificacion = $calificacion;
	    }

	    public function agregar_Nueva_Titulacion()
	    {
	        $query = database::prepare('INSERT INTO estudios (nombre_titulo, calificacion, nombre_centro_estudios, poblacion_centro_estudios, provincia_centro_estudios, fecha_comienzo_estudios, fecha_fin_estudios) VALUES(:nombre_titulo, :calificacion, :nombre_centro_estudios, :poblacion_centro_estudios, :provincia_centro_estudios, :fecha_comienzo_estudios, :fecha_fin_estudios)');
	        $query->bindParam(':nombre', $this->nombre_titulo);
	        $query->bindParam(':calificacion', $this->calificacion);
	        $query->bindParam(':nombre_centro_estudios', $this->nombre_centro_estudios);
	        $query->bindParam(':poblacion_centro_estudios', $this->poblacion_centro_estudios);
	        $query->bindParam(':provincia_centro_estudios', $this->provincia_centro_estudios);
	        $query->bindParam(':fecha_comienzo_estudios', $this->fecha_comienzo_estudios);
	        $query->bindParam(':fecha_fin_estudios', $this->fecha_fin_estudios);
	        $query->execute();
    	}

    	public function get_Obtener_Todas_Titulaciones()
    	{
	        $declaracion = database::prepare('SELECT * FROM estudios ORDER BY fecha_comienzo_estudios DESC;');
	        $declaracion -> execute();
	        return $declaracion -> fetchAll(PDO::FETCH_ASSOC);
    	}
	}
?>