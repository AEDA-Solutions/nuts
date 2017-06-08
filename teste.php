
<select>
	<?php
session_start();
$courses= array('Administração',
        'Administração Pública',
        'Agronomia',
        'Arquitetura e Urbanismo',
        'Arquivologia',
        'Artes Cênicas',
        'Artes Plásticas',
        'Artes Visuais',
        'Biblioteconomia',   
        'Biotecnologia',
        'Ciência da Computação',
        'Ciência Política',
        'Ciências Ambientais',
        'Ciências Biológicas',
        'Ciências Contábeis',
        'Ciências Econômicas',
        'Ciências Farmacêuticas',
        'Ciências Naturais',
        'Ciências Sociais',
        'Computação',
        'Comunicação Organizacional',
        'Comunicação Social',
        'Design',
        'Direito',
        'Educação Física',
        'Educação do Campo',
        'Enfermagem e Obstetrícia',
        'Engenharia Aeroespacial',
        'Engenharia Ambiental',
        'Engenharia Automotiva',
        'Engenharia Civil',
        'Engenharia de Computação',
        'Engenharia de Energia',
        'Engenharia de Redes e Comunicação',
        'Engenharia de Produção',
        'Engenharia de Software',
        'Engenharia Elétrica',
        'Engenharia Eletrônica',
        'Engenharia Florestal',
        'Engenharia Mecânica',
        'Engenharia Mecatrônica',
        'Estatística',
        'Farmácia',
        'Filosofia',
        'Física',
        'Fisioterapia',
        'Fonoaudiologia',
        'Geofísica',
        'Geografia',
        'Geologia',
        'Gestão Ambiental',
        'Gestão de Políticas Públicas',
        'Gestão de Agronegócio',
        'Gestão em Saúde Coletiva',
        'História',
        'Letras',
        'Letras-Tradução',
        'Línguas EStrangeiras Aplicadas - MSI',
        'Matemática',
        'Medicina',
        'Medicina Veterinária',
        'Museologia',
        'Música',
        'Nutrição',
        'Odontologia',
        'Pedagogia',
        'Psicologia',
        'Química',
        'Química Tecnológica',
        'Relações Internacionais',
        'Saúde Coletiva',
        'Serviço Social',
        'Teoria Crítica e História da Arte',
        'Terapia Ocupacional',
        'Turismo');
	foreach($courses AS $key => $value) {

  if($_SESSION['course'] == $value){
    $selected = "selected";

  }

  else{
    $selected = "";
  }
  echo "<option value= '{$value}' {$selected}>{$value}</option>";


  }
?>
</select>
	