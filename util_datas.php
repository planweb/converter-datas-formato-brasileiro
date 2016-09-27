<?php	
  
	/**
   * Recebe data no formato aaaa-mm-dd, dd/mm/aaaa ou timestamp e devolve em qualquer formato
	 * Retorna a data no formato brasileiro, sql ou timestamp
	 * @param date $data -> Formatos de entrada aaaa-mm-dd, dd/mm/aaaa ou timestamp
	 * @param string $formato -> Qualquer string que contenha as letras que representam as partes das datas
	 * [data] -> data padrão no formato brasileiro dd/mm/aaaa
	 * [datasql] -> data no formato mysql aaaa-mm-dd
	 * dd -> dia com dois dígitos
	 * mm -> mes com dois dígitos
	 * aaaa -> ano com quatro dígitos
	 * aa -> ano com dois últimos dígitos
	 * hh -> hora
	 * ii ou :mm -> minutos ou dois pontos + minutos
	 * ss -> segundos
	 */	
  function parseDate($data,$formato="") {
		
		if (empty($data))
			return '';
		
		if(is_numeric($data)){
			$data = date('Y-m-d H:i:s', $data);
		}

		@list($data,$horario)=explode(' ',trim($data));

		// Verifica se a data já está no formato brasileiro
		if($data{2} == '/' && $data{5} == '/'){
			@list($dia,$mes,$ano) = explode('/',$data);
			$formato_invertido = 'aaaa-mm-dd';	
		}else{
			@list($ano,$mes,$dia) = explode('-',$data);	
			$formato_invertido = 'dd/mm/aaaa';
		}

		$data_br = implode('/', [$dia,$mes,$ano]);
		$data_sql = implode('-', [$ano,$mes,$dia]);
		$data_time = strtotime($data_sql);
		
		@list($horas,$minutos,$segundos) = explode(':',$horario);
		
		if(empty($formato))
			$formato = '[data]';

		return str_replace(array('[data]','[timestamp]','[data_br]','[datasql]','[horario]',':mm','dd','mm','aaaa','aa','hh','ii','ss'),array($formato_invertido,$data_time,$data_br,$data_sql,$horario,':'.$minutos,$dia,$mes,$ano,substr($ano,-2,2),$horas,$minutos,$segundos),$formato);			
	}

	function databr($data="",$formato="dd/mm/aaaa"){
		return parseDate($data,$formato);
	}
	
	function datasql($data="",$formato="aaaa-mm-dd"){
		return parseDate($data,$formato);
	}

	function datatime($data="",$formato="[timestamp]"){
		return parseDate($data,$formato);
	}
?>
