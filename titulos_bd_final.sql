-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 04:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juegos`
--

-- --------------------------------------------------------

--
-- Table structure for table `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `lanzamiento` date NOT NULL,
  `genero` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `titulos`
--

INSERT INTO `titulos` (`id`, `titulo`, `descripcion`, `lanzamiento`, `genero`, `precio`, `publisher`, `imagen`) VALUES
(1, 'Grand Theft Auto V', 'Grand Theft Auto V para PC ofrece a los jugadores la opción de explorar el galardonado mundo de Los Santos y el condado de Blaine con una resolución de 4K y disfrutar del juego a 60 fotogramas por segundo', '2015-04-14', 'Acción', 15000.6, 'Rockstar Games', '/juegos_img/gta5.jpg'),
(2, 'Counter-Strike 2', 'Durante más de dos décadas, Counter-Strike ha brindado una experiencia competitiva de élite, una experiencia moldeada por millones de jugadores en todo el mundo. Ahora es el momento de comenzar el siguiente capítulo en la historia de CS. Esto es Counter-Strike 2.', '2012-08-21', 'Acción', 0, 'VALVE', '/juegos_img/cs2.jpg'),
(3, 'Dota 2', 'Cada día, millones de jugadores de todo el mundo entran en batalla como uno de los más de cien héroes de Dota. Y no importa si es su décima o su milésima hora de juego: siempre hay algo nuevo que descubrir.', '2013-07-09', 'Free to play', 0, 'VALVE', '/juegos_img/dota2.jpg'),
(4, 'Call of Duty: Black Ops 6', 'Call of Duty®: Black Ops 6 presenta la característica Campaña cinematográfica de Black Ops, la mejor experiencia de Multijugador y el épico regreso de Zomis pos rondas.', '2024-10-25', 'Acción', 59888.1, 'Blizzard', '/juegos_img/cod6.jpg'),
(5, 'Left 4 Dead 2', 'Ambientado en el apocalipsis zombi, Left 4 Dead 2 (L4D2) es la esperadísima secuela del galardonado Left 4 Dead, el juego cooperativo número 1 de 2008. Este FPS cooperativo de acción terrorífica lleva a tus amigos y a ti a través de ciudades, pantanos y cementerios del Profundo Sur de EE. UU', '2009-11-17', 'Acción', 0, 'VALVE', '/juegos_img/lfd2.jpg'),
(6, 'Portal 2', '¡La Iniciativa de Prueba Perpetua ha sido ampliada, permitiéndote ahora diseñar rompecabezas cooperativos para ti y tus amigos!', '2011-04-19', 'Acción', 10000, 'VALVE', '/juegos_img/portal2.jpg'),
(7, 'Half-Life 2', '1998. HALF-LIFE supone un impacto en la industria de juegos gracias a su combinación de acción frenética y narración continua y absorbente. El título debut de Valve fue galardonado con más de 50 premios, que sentaron las bases para que luego se convirtiera en El mejor juego para PC de la historia.', '2004-11-16', 'Acción', 1000.15, 'VALVE', '/juegos_img/hl2.jpg'),
(8, 'Metal Slug: Awakening', 'Metal Slug: Awakening continúa la jugabilidad clásica amada por los fanáticos, con nuevas y emocionantes características como World Adventure, Team-up de 3 jugadores y desafíos Roguelike. ¡Únete a tus amigos en línea para enfrentarte a jefes poderosos en cualquier momento y en cualquier lugar!', '2024-07-19', 'Aventura', 0, 'HAOPLAY Limited', '/juegos_img/metal_slug_aw.jpg'),
(9, 'Once Human', 'Once Human es un juego de supervivencia multijugador de mundo abierto ambientado en un extraño futuro postapocalíptico. Únete a tus amigos para enfrentarte a monstruosos enemigos, descubre conspiraciones secretas, compite por los recursos y construye tu propio territorio.', '2024-07-09', 'Supervivencia', 15000.6, 'Starry Studio', '/juegos_img/once_human.jpg'),
(10, 'SILENT HILL 2', '«Me llamo... Maria», dice la mujer, sonriendo. Su rostro, su voz... Es igual que ella.', '2024-10-08', 'Aventura', 95000.5, 'KONAMI', '/juegos_img/shill2.jpg'),
(11, 'Dead Space', 'El clásico de terror de ciencia ficción, regresa con una nueva versión totalmente renovada para ofrecer una experiencia aún más inmersiva, con mejoras visuales, de sonido y de jugabilidad, además de mantenerse fiel a la emocionante visión del juego original.', '2023-01-27', 'Aventura', 95000.5, 'Electronic Arts', '/juegos_img/dspace.jpg'),
(12, 'Resident Evil 4', 'La supervivencia es solo el comienzo. A seis años del desastre biológico en Raccoon City, Leon S. Kennedy, uno de los sobrevivientes, rastreó a la hija secuestrada del presidente hasta una aldea europea aislada, donde algo terrible le ha ocurrido a los lugareños.', '2023-03-23', 'Acción', 95000.5, 'Play Station', '/juegos_img/revil4.jpg'),
(13, 'Metro Exodus', 'Huye de las ruinas del Metro de Moscú y embárcate en un viaje épico que abarca todo el continente a través de la naturaleza post-apocalíptica rusa. Explora vastos niveles no lineales, piérdete en una experiencia inmersiva de supervivencia en un entorno sandbox y sigue una emocionante historia que abarca un año entero.', '2019-02-14', 'Acción', 59888.1, 'Deep Silver', '/juegos_img/metroexodus.jpg'),
(14, 'Metro Awakening', 'Metro Awakening es una aventura basada en la historia creada para realidad virtual que combina exploración atmosférica, sigilo y combate en una experiencia inmersiva. Ponte tu máscara de gas, enfréntate a la radiación y aventúrate en las profundidades del Metro.', '2024-11-07', 'Acción', 37555.8, 'Deep Silver', '/juegos_img/metroawakening.jpg'),
(15, 'Farming Simulator 25', 'Farming Simulator 25 te invita a unirte a la gratificante vida en la granja, ya sea en solitario o de forma cooperativa en el modo multijugador. ¡Esta es tu granja!', '2024-11-12', 'Simuladores', 10200.9, 'GIANTS Software GmbH', '/juegos_img/farmingsimulator.jpg'),
(16, 'DayZ', '¿Cuánto puedes sobrevivir en un mundo posapocalíptico? Una tierra invadida por zombis infectados, donde los sobrevivientes compiten por los recursos disponibles. ¿Forjarás alianzas con extraños? ¿O buscarás la soledad para evitar traiciones? Esto es DayZ. Esta es tu historia.', '2018-12-13', 'Acción', 520.5, 'Bohemia Interactive', '/juegos_img/dayz.jpg'),
(17, 'Project Zomboid', 'Project Zomboid es lo último en supervivencia zombie. Solo o en MP: saqueas, construyes, creas, luchas, cultivas y pescas en una lucha por sobrevivir. Un conjunto de habilidades de juego de rol incondicionales, un mapa extenso, un entorno de pruebas enormemente personalizable y un lindo mapache tutorial esperan a los incautos. Entonces, ¿cómo vas a morir? Todo lo que necesitas es un bocado.', '2013-11-08', 'Supervivencia', 10090.6, 'The Indie Stone', '/juegos_img/pzomboid.jpg'),
(18, 'Warhammer 40,000: Space Marine 2', 'Encarna la habilidad y la brutalidad sobrehumanas de un marine espacial. Usa habilidades mortales y armamento devastador para exterminar a los tiránidos. Defiende al Imperium y disfruta de acción en tercera persona en modo individual o multijugador.', '2024-09-09', 'Acción', 35000.1, 'Focus Entertainment', '/juegos_img/space_marine2.jpg'),
(19, 'Delta Force', 'Delta Force, un FPS táctico gratuito, regresa como última parte de la clásica serie. Como estandarte del género durante los últimos 25 años, Delta Force regresa con un arsenal mejorado de armas, entornos impactantes y un mundo realmente dinámico.', '2024-12-04', 'Acción', 32000.9, 'TiMi Studio Group', '/juegos_img/delta_force.jpg'),
(20, 'Dead Frontier 2', 'Survival Horror en línea en su forma más oscura. Como uno de los pocos supervivientes del brote, debes vivir en las ruinas en descomposición de la sociedad.', '2019-07-15', 'Supervivencia', 10090.6, 'Creaky Corpse Ltd', '/juegos_img/dead_frontier2.jpg'),
(21, 'The Last of Us Part I', 'Descubre el galardonado juego que inspiró la aclamada serie de televisión. Guía a Joel y Ellie en su travesía por una América posapocalíptica y encuentra aliados y enemigos inolvidables en The Last of Us.', '2023-03-28', 'Acción', 10090.6, 'Creaky Corpse Ltd', '/juegos_img/tlou2.jpg'),
(22, 'Balatro', 'El roguelike de póquer. Balatro es un creador de mazos hipnotizante donde juegas manos de póquer ilegal, descubres comodines que cambian tu juego y activas combinaciones hilarantes y llenas de adrenalina.', '2024-02-20', 'Indie', 79999, 'Playstack', '/juegos_img/balatro.jpg'),
(23, 'Lethal Company', 'Un horror cooperativo sobre hurgar en lunas abandonadas para vender chatarra a la Compañía.', '2024-10-23', 'Acción', 1, 'Zeekerss', '/juegos_img/lethal.jpg'),
(24, 'Detroit: Become Human', 'Detroit: Become Human pone el destino de la humanidad y los androides en tus manos. Cada decisión que tomes afectará al resultado del juego, en una de las tramas narrativas con ramificaciones más intrincadas que jamás se ha visto.', '2020-06-18', 'Acción', 9500.58, 'Quantic Dream', '/juegos_img/detroit-human.jpg'),
(25, 'Luma Island', 'Viaja a la isla de Luma para vivir una aventura épica solo o con tus amigos y familiares. Construye la granja de tus sueños, domina profesiones, colecciona Lumas mágicas, encuentra tesoros y desvela los misterios de la isla.', '2024-11-20', 'Aventura', 5600.5, 'Feel Free Games', '/juegos_img/luma.jpg'),
(26, 'War Thunder', 'War Thunder es el juego militar MMO gratuito y multiplataforma más completo del mercado que se enfoca en las aeronaves, vehículos y buques blindados del siglo XX y las unidades de combate modernas más avanzadas. Únete ahora y participa en batallas terrestres, aéreas y marítimas.', '2013-08-13', 'Multijugador masivo', 54600.8, 'Gaijin Network Ltd', '/juegos_img/war-thunder.jpg'),
(27, 'UNDERDOGS', 'UNDERGROUND MECH FIGHTS! ¡PELEAS CALLEJERAS DE MECHAS! ¡Enfúndate en 5 toneladas de metal y da rienda suelta a la violencia más metálica en un panorama oscuro!', '2024-01-25', 'Acción', 29906.9, 'One Hamsa', '/juegos_img/underdogs.jpg'),
(28, 'ATLYSS', 'Enter the world of ATLYSS, a Singleplayer/Online RPG where you can fight with or against friends in a surreal world filled with creatures beyond comprehension. Customize and progress your character(s), complete quests, and discover strange locations.', '2024-11-22', 'Rol', 5799.9, 'KisSoft', '/juegos_img/atlyss.jpg'),
(29, 'Diablo IV', 'Únete a la lucha por Santuario en Diablo® IV, la aventura de rol y acción definitiva. Vive la campaña alabada por la crítica y nuevo contenido de temporada.', '2023-10-17', 'Rol', 30000, 'Blizzard Entertainment, Inc.', '/juegos_img/diabloiv.jpg'),
(30, 'Overwatch 2', 'Overwatch® 2 es un shooter por equipos aclamado por la crítica ambientado en un futuro optimista con un plantel de héroes en evolución. Júntate con amigos y jugad hoy mismo.', '2023-08-10', 'Free to play', 0, 'Blizzard Entertainment, Inc.', '/juegos_img/overwatch2.jpg'),
(31, 'Rust', 'El único objetivo en Rust es sobrevivir. Todo quiere que mueras: la vida salvaje de la isla y otros habitantes, el medio ambiente y otros supervivientes. Haz lo que sea necesario para durar una noche más.', '2018-02-08', 'Acción', 39281, 'Facepunch Studios', '/juegos_img/rust.jpg'),
(32, 'Endling - Extinction is Forever', 'La extinción es para siempre.', '2022-07-19', 'Indie', 2240.5, 'HandyGames', '/juegos_img/endling.jpg'),
(33, 'eFootball', '¡El alucinante juego de fútbol con 750 millones de descargas a nivel mundial te está esperando! ¡Juega a eFootball™ con usuarios de todo el mundo!', '2021-09-29', 'Deportes', 0, 'KONAMI', '/juegos_img/efootball.jpg'),
(34, 'METAL GEAR RISING: REVENGEANCE', 'Desarrollado por Kojima Productions y PlatinumGames, METAL GEAR RISING: REVENGEANCE lleva la reconocida franquicia METAL GEAR a un territorio nuevo y emocionante con una experiencia de acción completamente nueva. El juego combina a la perfección acción pura y una narración épica que rodea a Raiden.', '2014-01-09', 'Acción', 14991, 'KONAMI', '/juegos_img/metalgearrising.jpg'),
(35, 'NBA 2K25', 'Domina cada cancha con autenticidad y realismo con tecnología ProPLAY™, que te brinda el máximo control sobre cómo juegas en NBA 2K25. Define tu legado en MyCAREER, MyTEAM, MyNBA-', '2024-10-28', 'Deportes', 89090.1, '2K', '/juegos_img/2k.jpg'),
(36, 'Blood Strike', 'Júntate con tus amigos y participa en combates rápidos en los modos de Todos contra todos, Batalla en equipo o Zona caliente! Blood Strike ofrece una amplia variedad de Strikers para elegir, cada uno con su especialidad y sus habilidades que te permiten desplegar drones, proteger muros y mucho más.', '2024-10-18', 'Multijugador masivo', 0, 'NetEase Games', '/juegos_img/bloodstrike.jpg'),
(37, 'The Planet Crafter - Planet Humble', 'Sin descripción :D', '2024-10-09', 'Aventura', 4490.5, 'Miju Games', '/juegos_img/planet-crafter.jpg'),
(38, 'Factorio: Space Age', 'Sin descripción :D', '2024-10-21', 'Simuladores', 17000, 'Wube Software LTD.', '/juegos_img/factory.jpg'),
(39, 'DayZ Frostline', 'Lánzate al archipiélago ártico de Sajal, que abarca unos inconmensurables 83 km² (sin contar la banquisa) y presenta un impresionante paisaje nevado lleno de nuevos desafíos y oportunidades para la supervivencia. Prepárate para una aventura verdaderamente inmersiva en la que el entorno es un enemigo tan mortífero como los infectados y los demás supervivientes.', '2024-10-15', 'Acción', 26999.1, 'Bohemia Interactive', '/juegos_img/dayzfrost.jpg'),
(40, 'Until Dawn', 'Recreado y mejorado para PC, Until Dawn te invita a revivir la pesadilla y sumergirte en un slasher atrapante y aterrador en el que cada decisión que tomes puede marcar la diferencia entre la vida y la muerte.', '2024-10-04', 'Aventura', 59999.6, 'Play Station', '/juegos_img/untilldown.jpg'),
(41, 'Brotato: Abyssal Terrors', 'Después de innumerables noches luchando contra demonios en los terrenos abrasadores de un planeta traicionero, Brotato ha decidido refugiarse en las profundidades de los océanos. Pero pronto descubrirá que no está solo.', '2024-10-25', 'Acción', 2490.05, 'Blobfish', '/juegos_img/brotato.jpg'),
(42, 'Watch_Dogs 2 - Ubisoft Pack', 'Eres más que un simple fan. Eres parte del equipo de desarrollo de Ubisoft. Apúntate al estilo de Ubisoft y ven con nosotros. No podríamos hacerlo sin ti', '2016-11-28', 'Acción', 3999.59, 'Ubisoft', '/juegos_img/watch-dogs-dlc.jpg'),
(43, 'Tom Clancys Rainbow Six Siege', 'Tom Clancys Rainbow Six® Siege es un shooter táctico realista por equipos donde una cuidadosa planificación y ejecución son claves para la victoria.', '2015-01-01', 'Acción', 15990.9, 'Ubisoft', '/juegos_img/r6s.jpg'),
(44, 'Star Wars Outlaws', 'Disfruta del primer juego de mundo abierto de Star Wars™ y explora distintos lugares por toda la galaxia, tanto nuevos como emblemáticos. Arriésgalo todo como la buscavidas Kay Vess, una sinvergüenza que anhela la libertad y comenzar una vida nueva.', '2024-11-21', 'Acción', 65990.6, 'Ubisoft', '/juegos_img/outlaws.jpg'),
(45, 'Life is Strange: Double Exposure', 'Cuando Max Caulfield encuentra a su amiga Safi muerta en la nieve, abre un portal a una línea temporal paralela. Con su nuevo poder para cruzar entre dos líneas temporales, ¿conseguirá Max resolver y evitar el mismo asesinato?', '2024-10-29', 'Acción', 39990.9, 'Square Enix', '/juegos_img/lifestrange.jpg'),
(46, 'S.T.A.L.K.E.R. 2: Heart of Chornobyl', 'Descubre la Zona de exclusión de Chornóbil, llena de enemigos peligrosos, anomalías letales y artefactos poderosos. Descubre tu propia historia épica y ábrete camino al Corazón de Chornóbil. Elige sabiamente, pues tus decisiones determinarán tu destino.', '2024-11-20', 'Acción', 45000, 'GSC Game World', '/juegos_img/stalker_2.jpg'),
(47, 'HELLDIVERS 2', 'La última línea ofensiva de la galaxia. Enlístate en los Helldivers y únete a la lucha por la libertad en una galaxia hostil en este juego de disparos en tercera persona frenético y feroz', '2024-08-02', 'Accion', 37000, 'PlayStation', '/juegos_img/helldivers_2.jpg'),
(48, 'EA SPORTS FC 25', 'EA SPORTS FC™ 25 te ofrece más formas de ganar para el club. Forma equipo con amistades en tus modos favoritos con el nuevo Rush 5 vs. 5 y lidera a tu club hacia la victoria gracias a FC IQ, que te ofrece más control táctico que nunca.', '2024-09-27', 'Deportes', 75000, 'Electronic Arts', '/juegos_img/fifa25.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `titulos`
--
ALTER TABLE `titulos`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
