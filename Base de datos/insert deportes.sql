
	#Deporte
INSERT INTO `deporte` (`nombre_deporte`) VALUES  ('Futbol');
INSERT INTO `deporte` (`nombre_deporte`) VALUES  ('Baloncesto');
INSERT INTO `deporte` (`nombre_deporte`) VALUES  ('Balonmano');
INSERT INTO `deporte` (`nombre_deporte`) VALUES  ('Fútbol Sala');

	#Temporada
INSERT INTO `temporada` (`ano_principio`,`ano_fin`) VALUES  ('2016','2017');
INSERT INTO `temporada` (`ano_principio`,`ano_fin`) VALUES  ('2017','2018');
INSERT INTO `temporada` (`ano_principio`,`ano_fin`) VALUES  ('2018','2019');
INSERT INTO `temporada` (`ano_principio`,`ano_fin`) VALUES  ('2019','2020');

	#Tipo de arbitro
INSERT INTO tipo_arbitro (iddeporte_tarb,nombre_tarb) VALUES  (1,'Principal');
INSERT INTO tipo_arbitro (iddeporte_tarb,nombre_tarb) VALUES  (2,'Lineal');

	#Arbitro
INSERT INTO arbitro (idtemporada_arb,idtipoarbitro_arb,nombre_arb,apellidos_arb,fechanac_arb) VALUES  (1,2,'Jordi','Hurtado',1742);
INSERT INTO arbitro (idtemporada_arb,idtipoarbitro_arb,nombre_arb,apellidos_arb,fechanac_arb) VALUES  (1,1,'Sergio','Rodriguez',1994);

	#posicion
INSERT INTO posicion (	iddeporte_pos,nombre_pos) VALUES  (1,'Portero');
INSERT INTO posicion (	iddeporte_pos,nombre_pos) VALUES  (1,'Delantero');
INSERT INTO posicion (	iddeporte_pos,nombre_pos) VALUES  (2,'Base');
INSERT INTO posicion (	iddeporte_pos,nombre_pos) VALUES  (3,'Lateral');
	#Tipo de Entrenador
INSERT INTO tipo_entrenador (deporte_tent,nombre_tent) VALUES  (1,'Primer Entrenador');
INSERT INTO tipo_entrenador (deporte_tent,nombre_tent) VALUES  (1,'Segundo Entrenador');

	#Tipo de incidencias
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (1,'Gol');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Asistencia');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (1,'Tarjeta Roja');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (1,'Tarjeta Amarilla');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (1,'Falta');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (1,'Cambio');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (1,'Penalti');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (1,'Córner');

INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Tiro libre');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Canasta simple');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'triple');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Asistencia');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Rebote');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Falta');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Falta Técnica');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Falta Antideportiva');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Cambio');

INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Gol');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Asistencia');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Córner');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Penalti');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Golpe Franco');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Conducta Antideportiva');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Tarjeta Amarilla');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Tarjeta Roja');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Tarjeta Azul');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (3,'Cambio');

INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (4,'Gol');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (4,'Asistencia');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (4,'Falta');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (4,'Conducta Antideportiva');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (4,'Penalti');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (4,'Tarjeta Amarilla');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (4,'Tarjeta Roja');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (4,'Cambio');




	#Estadio
INSERT INTO estadio (nombre_estadio) VALUES  ('El Campo');
INSERT INTO estadio (nombre_estadio) VALUES  ('Santiago Bernabeu');
INSERT INTO estadio (nombre_estadio) VALUES  ('Campo Nuevo');
INSERT INTO estadio (nombre_estadio) VALUES  ('Mini Estadio');
INSERT INTO estadio (nombre_estadio) VALUES  ('Gran Estadio');


	#Entrenadores
INSERT INTO entrenadores ( idtentrenador_ent, nombre_ent, apellidos_ent, nacionalidad_ent) VALUES  (1, 'Ivan', 'Ojeda', 'Montesco');
INSERT INTO entrenadores ( idtentrenador_ent, nombre_ent, apellidos_ent, nacionalidad_ent) VALUES  (2, 'Miguel', 'Urbano', 'Çatalâ');
INSERT INTO entrenadores ( idtentrenador_ent, nombre_ent, apellidos_ent, nacionalidad_ent) VALUES  (2, 'Serio', 'Siles', 'Mongolo');

	#Equipo
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (1, "Real Jaén", "Jaén", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (1, "Villanueva del Arzobispo C.F", "Vva", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (1, "Mogon F.C", "Mogon", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (1, "AM SYSTEM SA", "Jaen", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (2, "Villanueva del Arzobispo C.F", "Vva", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (2, "Real Jaén", "Jaén", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (3, "Real Jaén", "Jaén", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (3, "Mogon F.C", "Mogon", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (4, "Mogon F.C", "Mogon", "Jaén");
INSERT INTO equipo (deporte_iddeporte, nombre_eq, ciudad_eq, provincia_eq) VALUES  (4, "Villanueva del Arzobispo C.F", "Vva", "Jaén");

	#Jugador
INSERT INTO  jugador ( nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug) VALUES  ( "José Ángel",  "Lopez Santos", "Molina", '1998-07-09', "12675297F", "Mongolo");
INSERT INTO  jugador ( nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug) VALUES  ( "Adrián",  "Ruiz Martínez", "PKT", '2000-07-13', "36579369Ñ", "Nicaragüense");
INSERT INTO  jugador ( nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug) VALUES  ( "Fernando",  "Floro", "Kasper", '2017-07-02', "12675227F", "Mongolo");
INSERT INTO  jugador ( nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug) VALUES  ( "Carlos",  "Lopez", "Willy", '1998-02-09', "92675297F", "Mongolo");
INSERT INTO  jugador ( nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug) VALUES  ( "José",  "Santos", "El puma", '1999-07-09', "16675297F", "mozambiqueño");
INSERT INTO  jugador ( nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug) VALUES  ( "Ángel",  "antos", "El tigre", '1908-07-09', "12123297F", "sudanés");
INSERT INTO  jugador ( nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug) VALUES  ( "Gergio",  "Rodri", "El mono", '1991-04-06', "02675297F", "Mongolo");
INSERT INTO  jugador ( nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug) VALUES  ( "Fragancio",  "Lopez", "Fraga", '1998-07-09', "12675297T", "Español");
	#Liga
INSERT INTO liga (nombre_lig) VALUES  ("Liga Española");
INSERT INTO liga (nombre_lig) VALUES  ("Liga Italiana");
	
	#Division
INSERT INTO division (nombre_div,liga_idliga) VALUES  ("Liga Santander",1);
INSERT INTO division (nombre_div,liga_idliga) VALUES  ("Liga 123",1);
INSERT INTO division (nombre_div,liga_idliga) VALUES  ("Serie A",2);
INSERT INTO division (nombre_div,liga_idliga) VALUES  ("Serie B",2);
	#temporada_equipo
INSERT INTO temporada_equipo (idtemporada_temeq, idequipo_temeq,presidente_temeq,idestadio_temeq,identrenador_temeq,division_temeq) VALUES  (1,1,"Aure Cano",1,1,1);
INSERT INTO temporada_equipo (idtemporada_temeq, idequipo_temeq,presidente_temeq,idestadio_temeq,identrenador_temeq,division_temeq) VALUES  (2,1,"Aure Cano",1,1,1);
INSERT INTO temporada_equipo (idtemporada_temeq, idequipo_temeq,presidente_temeq,idestadio_temeq,identrenador_temeq,division_temeq) VALUES  (1,2,"Manuela Carmena",2,2,1);
INSERT INTO temporada_equipo (idtemporada_temeq, idequipo_temeq,presidente_temeq,idestadio_temeq,identrenador_temeq,division_temeq) VALUES  (2,2,"Puigdemont",3,3,2);
INSERT INTO temporada_equipo (idtemporada_temeq, idequipo_temeq,presidente_temeq,idestadio_temeq,identrenador_temeq,division_temeq) VALUES  (1,3,"",4,3,2);
	#Calendario/Partidos
	
INSERT INTO calendario (fecha_cal, local_cal, visitante_cal, jornada_cal, idestadio_cal, idtemporada_cal, goleslocal_cal, golesvisitante_cal) VALUES  ('2019-11-08', 1, 2,"1", 1, 1, 0, 17);
INSERT INTO calendario (fecha_cal, local_cal, visitante_cal, jornada_cal, idestadio_cal, idtemporada_cal, goleslocal_cal, golesvisitante_cal) VALUES  ('2019-11-22', 2, 1,"2", 1, 1, 18, 0);
INSERT INTO calendario (fecha_cal, local_cal, visitante_cal, jornada_cal, idestadio_cal, idtemporada_cal, goleslocal_cal, golesvisitante_cal) VALUES  ('2019-11-22', 1, 3,"1", 1, 1, 0, 0);
INSERT INTO calendario (fecha_cal, local_cal, visitante_cal, jornada_cal, idestadio_cal, idtemporada_cal, goleslocal_cal, golesvisitante_cal) VALUES  ('2019-11-22', 5, 6,"1", 3, 1, 78, 97);
INSERT INTO calendario (fecha_cal, local_cal, visitante_cal, jornada_cal, idestadio_cal, idtemporada_cal, goleslocal_cal, golesvisitante_cal) VALUES  ('2019-11-22', 6, 5,"1", 3, 1, 56, 123);

	#Incidencias
	
INSERT INTO incidencia (idtincidencia_inc, idpartido_inc, idjugador1_inc, idjugador2_inc, tiempo_inc) VALUES  (1,1,1,2,"94");
INSERT INTO incidencia (idtincidencia_inc, idpartido_inc, idjugador1_inc, idjugador2_inc, tiempo_inc) VALUES  (2,2,2,1,"23");
INSERT INTO incidencia (idtincidencia_inc, idpartido_inc, idjugador1_inc, idjugador2_inc, tiempo_inc) VALUES  (5,1,4,1,"34");

	#Arbitra ( Calendario/partido - Arbitro)
	
INSERT INTO arbitra (idpartido_arbitra, idarbitro_arbitra) VALUES  (1,1);
INSERT INTO arbitra (idpartido_arbitra, idarbitro_arbitra) VALUES  (2,2);
INSERT INTO arbitra (idpartido_arbitra, idarbitro_arbitra) VALUES  (3,1);
INSERT INTO arbitra (idpartido_arbitra, idarbitro_arbitra) VALUES  (4,1);

	#Jugador_equipo_temporada
INSERT INTO jugador_equipo_temporada (jugador_idjugador, temporada_idtemporada,idequipo_jet,idposicion_jet,numero_jug_jet) VALUES  (1,1,1,2,4);
INSERT INTO jugador_equipo_temporada (jugador_idjugador, temporada_idtemporada,idequipo_jet,idposicion_jet,numero_jug_jet) VALUES  (2,2,2,1,96);
INSERT INTO jugador_equipo_temporada (jugador_idjugador, temporada_idtemporada,idequipo_jet,idposicion_jet,numero_jug_jet) VALUES  (3,1,1,2,90);
INSERT INTO jugador_equipo_temporada (jugador_idjugador, temporada_idtemporada,idequipo_jet,idposicion_jet,numero_jug_jet) VALUES  (4,1,3,1,6);
INSERT INTO jugador_equipo_temporada (jugador_idjugador, temporada_idtemporada,idequipo_jet,idposicion_jet,numero_jug_jet) VALUES  (5,1,5,3,34);
INSERT INTO jugador_equipo_temporada (jugador_idjugador, temporada_idtemporada,idequipo_jet,idposicion_jet,numero_jug_jet) VALUES  (6,2,6,3,39);





