<?php
if ($_REQUEST['cod']==1 ) {
	echo "<strong>Contra la ceguera:</strong> Este es un libro que anhela recuperar la pasión por la vida y el entusiasmo por cambiar las cosas. Un libro con un motor en sus verbos. Este libro sueña y, aún más, siente la utopía. Una utopía de lo posible, de lo concreto, de lo cercano e inmediato, de lo perentorio y lo real que merece ser cambiado para que la ciudadanía pueda vivir de otra manera..";
}
if ($_REQUEST['cod']==2) {
	echo "<strong>Los amos del mundo:</strong> El resultado de una economía en manos de la oligarquía financiera es el alto endeudamiento, un empleo bajo mínimos y un debilitamiento del Estado del bienestar y de la calidad de vida de las personas, con el aumento de la pobreza y la desigualdad, y un mundo en donde disminuye la representatividad de las instituciones democráticas y la voz de la ciudadanía pierde fuerza.";
}
if ($_REQUEST['cod']==3) {
    echo "<strong>Hombres buenos:</strong> Durante el viaje a París para conseguir L'Encyclopédie, los 2 protagonistas principales, el bibliotecario Hermógenes Molina y el almirante don Pedro Zárate, han de enfrentarse a diferentes problemas, sufren el asalto de bandidos y deben visitar oscuras librerías donde se venden todo tipo de libros prohibidos, desde las obras de Voltaire y Rousseau, hasta publicaciones pornográficas. A lo largo del relato, ambos protagonista se van conociendo cada vez más estrechamente y debaten sobre temas en los que tiene diferentes opiniones, conciliando poco a poco sus diferencia y alcanzando finalmente una gran amistad.";
}
if ($_REQUEST['cod']==4 || $_REQUEST['cod']>12)
  echo "<strong>La historia:</strong> Este día la profesión y las relaciones con superiores y con tu 
madre serán de importancia. Actividad en relación a estos temas. Momentos positivos con compañeros 
de trabajo. Actividad laboral agradable.";
if ($_REQUEST['cod']==5)
  echo "<strong>Leo:</strong> Este día los estudios, los viajes, el extranjero y la espiritualidad 
serán lo importante. Pensamientos, religión y filosofía también. Vivencias kármicas de la oca te 
vuelven responsable tomando decisiones.";
if ($_REQUEST['cod']==6)
  echo "<strong>Virgo:</strong> Para este día toma importancia tu vida sexual, tal vez miedos, temas 
legales, juicios o herencias. Experiencias extrañas. Hay karma de prueba durante este per?do en tu 
parte psicol?ica, generándose algunos replanteos.";
if ($_REQUEST['cod']==7)
  echo "<strong>Libra:</strong> Hoy todo asunto tiene que ver con tu pareja, también con socios, con 
la gente o el público. Ellos serán lo más importante del día. Ganancias a través de especulaciones o 
del juego. Actividades vocacionales artísticas.";
if ($_REQUEST['cod']==8)
  echo "<strong>Escorpio:</strong> Hoy todo asunto tiene que ver con temas de trabajo y de salud. 
Presta atención a ambos. Experiencias diversas con compañeros. Durante este período tendrás muchos 
recursos para ganar dinero.";
if ($_REQUEST['cod']==9)
  echo "<strong>Sagitario:</strong> Durante este día se vivirán cambios en relación a los noviazgos 
o a los hijos. Creatividad, actividad, diversiones y salidas. Período de encuentros con personas o 
situaciones que te impresionan.";
if ($_REQUEST['cod']==10)
  echo "<strong>Capricornio:</strong> Los cambios del día tienen que ver con tu hogar, con la 
convivencia y con el padre. Asuntos relativos al carácter en la convivencia. El karma de 
responsabilidad de estos momentos te acercarán al mundo de lo desconocido, mucha madurez y contacto 
con el más allá";
if ($_REQUEST['cod']==11)
  echo "<strong>Acuario:</strong> Hoy todo asunto tiene que ver con el entorno inmediato, hermanos y 
vecinos, con la comunicación, los viajes cortos o traslados frecuentes. El hablar y trasladarse serán
importante hoy. Mentalidad e ideas activas.";
if ($_REQUEST['cod']==12)
  echo "<strong>Piscis:</strong> Durante este día se vivirán cambios en la economía, movimientos en 
los ingresos, negocios, valores. Momentos de gran fuerza y decisiónes profesionales, buscarán el 
liderazgo.";

?>