<?php

namespace Database\Seeders;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peliculas = array(
            array(
            'genero' => 'Drama',
            'titulo' => 'El padrino',
            'año' => '1972',
            'director' => 'Francis Ford Coppola',
            'imagen' => 'elpadrino.jpg',
            'sinopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \\\'Il consigliere\\\' Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.',
            'precio' => 9.99,
            'cantidad' => 5),
        
            array(
            'genero' => 'Drama',    
            'titulo' => 'El Padrino. Parte II',
            'año' => '1974',
            'director' => 'Francis Ford Coppola',
            'imagen' => 'elpadrinoII.jpg',
            'sinopsis' => 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael Corleone como jefe de los negocios familiares y los orígenes del patriarca, el ya fallecido Don Vito, primero en Sicilia y luego en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.',
            'precio' => 4.99,
            'cantidad' => 2),
        
            array(
            'genero' => 'Drama',   
            'titulo' => 'La lista de Schindler',
            'año' => '1993',
            'director' => 'Steven Spielberg',
            'imagen' => 'schindler.jpg',
            'sinopsis' => 'Segunda Guerra Mundial (1939-1945). Oskar Schindler (Liam Neeson), un hombre de enorme astucia y talento para las relaciones públicas, organiza un ambicioso plan para ganarse la simpatía de los nazis. Después de la invasión de Polonia por los alemanes (1939), consigue, gracias a sus relaciones con los nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente. Su gerente (Ben Kingsley), también judío, es el verdadero director en la sombra, pues Schindler carece completamente de conocimientos para dirigir una empresa.',
            'precio' => 21.99,
            'cantidad' => 8),
        
            array(
            'genero' => 'Policíaco',    
            'titulo' => 'Pulp Fiction',
            'año' => '1994',
            'director' => 'Quentin Tarantino',
            'imagen' => 'pulpfiction.jpg',
            'sinopsis' => 'Jules y Vincent, dos asesinos a sueldo con muy pocas luces, trabajan para Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse manos a la obra. Su misión: recuperar un misterioso maletín.',
            'precio' => 11.99,
            'cantidad' => 8),
        
            array(
            'genero' => 'Drama',  
            'titulo' => 'Cadena perpetua',
            'año' => '1994',
            'director' => 'Frank Darabont',
            'imagen' => 'cadenaperpetua.jpg',
            'sinopsis' => 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.',
            'precio' => 9.99,
            'cantidad' => 7),
        
            array(
            'genero' => 'Comedia',
            'titulo' => 'El golpe',
            'año' => '1973',
            'director' => 'George Roy Hill',
            'imagen' => 'elgolpe.jpg',
            'sinopsis' => 'Chicago, años treinta. Redford y Newman son dostimadores que deciden vengar la muerte de un viejo y querido colega, asesinado por orden de un poderoso gángster (Robert Shaw). Para ello urdirán un ingenioso y complicado plan con la ayuda de todos sus amigos y conocidos.',
            'precio' => 22.99,
            'cantidad' => 10),
        
            array(
            'genero' => 'Drama',
            'titulo' => 'La vida es bella',
            'año' => '1997',
            'director' => 'Roberto Benigni',
            'imagen' => 'lavidaesbella.jpg',
            'sinopsis' => 'En 1939, a punto de estallar la Segunda Guerra Mundial (1939-1945), el extravagante Guido llega a Arezzo (Toscana) con la intención de abrir una librería. Allí conoce a Dora y, a pesar de que es la prometida del fascista Ferruccio, se casa con ella y tiene un hijo. Al estallar la guerra, los tres son internados en un campo de exterminio, donde Guido hará lo imposible para hacer creer a su hijo que la terrible situación que están padeciendo es tan sólo un juego.',
            'precio' => 16.99,
            'cantidad' => 8),
        
            array(
            'genero' => 'Crimen',    
            'titulo' => 'Uno de los nuestros',
            'año' => '1990',
            'director' => 'Martin Scorsese',
            'imagen' => 'unodelosnuestros.jpg',
            'sinopsis' => 'Henry Hill, hijo de padre irlandés y madre siciliana, vive en Brooklyn y se siente fascinado por la vida que llevanlos gángsters de su barrio, donde la mayoría de los vecinos son inmigrantes. Paul Cicero, el patriarca de la familia Pauline, es el protector del barrio. A los trece años, Henry decide abandonar la escuela y entrar a formar parte de la organización mafiosa como chico de los recados; muy pronto se gana la confianza de sus jefes, gracias a lo cual irá subiendo de categoría.',
            'precio' => 19.99,
            'cantidad' => 5),
        
            array(
            'genero' => 'Comedia dramática',
            'titulo' => 'Alguien voló sobre el nido del cuco',
            'año' => '1975',
            'director' => 'Milos Forman',
            'imagen' => 'alguienvolo.jpg',
            'sinopsis' => 'Randle McMurphy (Jack Nicholson), un hombre condenado por asalto, y un espíritu libre que vive contracorriente, es recluido en un hospital psiquiátrico. La inflexible disciplina del centro acentúa su contagiosa tendencia al desorden, que acabará desencadenando una guerra entre los pacientes y el personal de la clínica con la fría y severa enfermera Ratched (Louise Fletcher) a la cabeza. La suerte de cada paciente del pabellón está en juego.',
            'precio' => 19.99,
            'cantidad' => 7),
        
            array(
            'genero' => 'Drama',    
            'titulo' => 'American History X',
            'año' => '1998',
            'director' => 'Tony Kaye',
            'imagen' => 'americanhistory.jpg',
            'sinopsis' => 'Derek (Edward Norton), un joven "skin head" californiano de ideología neonazi, fue encarcelado por asesinar a un negro que pretendía robarle su furgoneta. Cuando sale de prisión y regresa a su barrio dispuesto a alejarse del mundo de la violencia, se encuentra con que su hermano pequeño (Edward Furlong), para quien Derek es el modelo a seguir, sigue el mismo camino que a él lo condujo a la cárcel.',
            'precio' => 10.99,
            'cantidad' => 8),
        
            array(
            'genero' => 'Wéstern',    
            'titulo' => 'Sin perdón',
            'año' => '1992',
            'director' => 'Clint Eastwood',
            'imagen' => 'sinperdon.jpg',
            'sinopsis' => 'William Munny (Clint Eastwood) es un pistolero retirado, viudo y padre de familia, que tiene dificultades económicas para sacar adelante a su hijos. Su única salida es hacer un último trabajo. En compañía de un viejo colega (Morgan Freeman) y de un joven inexperto (Jaimz Woolvett), Munny tendrá que matar a dos hombres que cortaron la cara a una prostituta.',
            'precio' => 11.99,
            'cantidad' => 7),
        
            array(
            'genero' => 'Crimen',    
            'titulo' => 'El precio del poder',
            'año' => '1983',
            'director' => 'Brian De Palma',
            'imagen' => 'elpreciodelpoder.jpg',
            'sinopsis' => 'Tony Montana es un emigrante cubano frío y sanguinario que se instala en Miami con el propósito de convertirse en un gángster importante. Con la colaboración de su amigo Manny Rivera inicia una fulgurante carrera delictiva con el objetivo de acceder a la cúpula de una organización de narcos.',
            'precio' => 12.99,
            'cantidad' => 10),
        
            array(
            'genero' => 'Bélico',    
            'titulo' => 'El pianista',
            'año' => '2002',
            'director' => 'Roman Polanski',
            'imagen' => 'elpianista.jpg',
            'sinopsis' => 'Wladyslaw Szpilman, un brillante pianista polaco de origen judío, vive con su familia en el ghetto de Varsovia. Cuando, en 1939, los alemanes invaden Polonia,consigue evitar la deportación gracias a la ayuda de algunosamigos. Pero tendrá que vivir escondido y completamente aislado durante mucho tiempo, y para sobrevivir tendrá que afrontar constantes peligros.',
            'precio' => 9.99,
            'cantidad' => 7),
        
            array(
            'genero' => 'Misterio',    
            'titulo' => 'Seven',
            'año' => '1995',
            'director' => 'David Fincher',
            'imagen' => 'seven.jpg',
            'sinopsis' => 'El veterano teniente Somerset (Morgan Freeman),del departamento de homicidios, está a punto de jubilarse y ser reemplazado por el ambicioso e impulsivo detective David Mills (Brad Pitt). Ambos tendrán que colaborar en la resolución de una serie de asesinatos cometidos por un psicópata que toma como base la relación de los siete pecados capitales: gula, pereza, soberbia, avaricia, envidia, lujuria e ira. Los cuerpos de las víctimas, sobre los que el asesino se ensaña de manera impúdica, se convertirán para los policías en un enigma que les obligará a viajar al horror y la barbarie más absoluta.',
            'precio' => 19.99,
            'cantidad' => 5),
        
            array(
            'genero' => 'Terror',    
            'titulo' => 'El silencio de los corderos',
            'año' => '1991',
            'director' => 'Jonathan Demme',
            'imagen' => 'silenciocorderos.jpg',
            'sinopsis' => 'El FBI busca a "Buffalo Bill", un asesino en serie que mata a sus víctimas, todas adolescentes, después de prepararlas minuciosamente y arrancarles la piel.Para poder atraparlo recurren a Clarice Starling, una brillante licenciada universitaria, experta en conductas psicópatas, que aspira a formar parte del FBI. Siguiendo las instrucciones de su jefe, Jack Crawford, Clarice visita la cárcel de alta seguridad donde el gobierno mantiene encerradoa Hannibal Lecter, antiguo psicoanalista y asesino, dotado de una inteligencia superior a la normal. Su misión será intentar sacarle información sobre los patrones de conducta de "Buffalo Bill".',
            'precio' => 17.99,
            'cantidad' => 9),
        
            array(
            'genero' => 'Crimen',    
            'titulo' => 'La naranja mecánica',
            'año' => '1971',
            'director' => 'Stanley Kubrick',
            'imagen' => 'naranjamecanica.jpg',
            'sinopsis' => 'Gran Bretaña, en un futuro indeterminado. Alex (Malcolm McDowell) es un joven muy agresivo que tiene dos pasiones: la violencia desaforada y Beethoven. Es el jefe de la banda de los drugos, que dan rienda suelta a sus instintos más salvajes apaleando, violando y aterrorizando a la población. Cuando esa escalada de terror llega hasta el asesinato, Alex es detenido y, en prisión, se someterá voluntariamente a una innovadora experiencia de reeducación que pretende anular drásticamente cualquier atisbo de conductaantisocial.',
            'precio' => 7.99,
            'cantidad' => 4),
        
            array(
            'genero' => 'Bélico',    
            'titulo' => 'La chaqueta metálica',
            'año' => '1987',
            'director' => 'Stanley Kubrick',
            'imagen' => 'chaquetametalica.jpg',
            'sinopsis' => 'Un grupo de reclutas se prepara en Parish Island, centro de entrenamiento de la marina norteamericana. Allí está el sargento Hartman, duro e implacable, cuya única misión en la vida es endurecer el cuerpo y el alma de los novatos, para que puedan defenderse del enemigo. Pero no todos los jóvenes están preparados para soportar sus métodos.',
            'precio' => 4.99,
            'cantidad' => 2),
        
            array(
            'genero' => 'Ciencia Ficción',    
            'titulo' => 'Blade Runner',
            'año' => '1982',
            'director' => 'Ridley Scott',
            'imagen' => 'bladerunner.jpg',
            'sinopsis' => 'A principios del siglo XXI, la poderosa Tyrell Corporation creó, gracias a los avances de la ingeniería genética, un robot llamado Nexus 6, un ser virtualmente idéntico al hombre pero superior a él en fuerza y agilidad, al que se dio el nombre de Replicante. Estos robots trabajaban como esclavos en las colonias exteriores de la Tierra. Después de la sangrienta rebelión de un equipo de Nexus-6, los Replicantes fueron desterrados de la Tierra. Brigadas especiales de policía, los Blade Runners, tenían órdenes de matar a todos los que no hubieran acatado la condena. Pero a esto no se le llamaba ejecución, se le llamaba "retiro".',
            'precio' => 7.99,
            'cantidad' => 5),
        
            array(
            'genero' => 'Drama',    
            'titulo' => 'Taxi Driver',
            'año' => '1976',
            'director' => 'Martin Scorsese',
            'imagen' => 'taxidriver.jpg',
            'sinopsis' => 'Para sobrellevar el insomnio crónico que sufre desde su regreso de Vietnam, Travis Bickle (Robert De Niro) trabaja como taxista nocturno en Nueva York. Es un hombre insociable que apenas tiene contacto con los demás, se pasa los días en el cine y vive prendado de Betsy (Cybill Shepherd), una atractiva rubia que trabaja como voluntaria en una campaña política. Pero lo que realmente obsesiona a Travis es comprobar cómo la violencia, la sordidez y la desolación dominan la ciudad.Y un día decide pasar a la acción.',
            'precio' => 14.99,
            'cantidad' => 8),
            
            array(
            'genero' => 'Drama',
            'titulo' => 'El club de la lucha',
            'año' => '1999',
            'director' => 'David Fincher',
            'imagen' => 'clubdelalucha.jpg',
            'sinopsis' => 'Un joven hastiado de su gris y monótona vida lucha contra el insomnio. En un viaje en avión conoce a un carismático vendedor de jabón que sostiene una teoría muy particular: el perfeccionismo es cosa de gentes débiles; sólo la autodestrucción hace que la vida merezca la pena. Ambos deciden entonces fundar un club secreto de lucha, donde poder descargar sus frustaciones y su ira, que tendrá un éxito arrollador.',
            'precio' => 9.99,
            'cantidad' => 3)
        );

        foreach ($peliculas as $campos)
        {
            Pelicula::create([
                'id_genero' => Genero::getGeneroByName($campos["genero"])->first()->id,
                'titulo' => $campos["titulo"],
                'director' => $campos["director"],
                'año' => $campos["año"],
                'precio' => $campos["precio"],
                'sinopsis' => $campos["sinopsis"],
                'cantidad' => $campos["cantidad"],
                'imagen' => $campos["imagen"],
            ]);
        }

        //Pelicula::factory()->times(15)->create();
    }
}
