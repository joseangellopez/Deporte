	#Deporte
INSERT INTO `deporte` (`nombre_deporte`) VALUES  ('Futbol');
INSERT INTO `deporte` (`nombre_deporte`) VALUES  ('Baloncesto');

	#Temporada
INSERT INTO `temporada` (`ano_principio`,`ano_fin`) VALUES  ('2018','2019');
INSERT INTO `temporada` (`ano_principio`,`ano_fin`) VALUES  ('2019','2020');

	#Tipo de arbitro
INSERT INTO tipo_arbitro (iddeporte_tarb,nombre_tarb) VALUES  (1,'Principal');
INSERT INTO tipo_arbitro (iddeporte_tarb,nombre_tarb) VALUES  (2,'Lineal');

	#Arbitro
INSERT INTO arbitro (idtemporada_arb,idtipoarbitro_arb,nombre_arb,apellidos_arb,fechanac_arb) VALUES  (1,2,'Jordi','Hurtado',1742);
INSERT INTO arbitro (idtemporada_arb,idtipoarbitro_arb,nombre_arb,apellidos_arb,fechanac_arb) VALUES  (2,1,'Sergio','Rodriguez',1994);

	#posicion
INSERT INTO posicion (	iddeporte_pos,nombre_pos) VALUES  (1,'Portero');
INSERT INTO posicion (	iddeporte_pos,nombre_pos) VALUES  (2,'Base');
	#Tipo de Entrenador
INSERT INTO tipo_entrenador (deporte_tent,nombre_tent) VALUES  (2,'Primer Entrenador');
INSERT INTO tipo_entrenador (deporte_tent,nombre_tent) VALUES  (1,'Segundo Entrenador');

	#Tipo de incidencias
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (1,'Tarjeta Roja');
INSERT INTO tipo_incidencias (iddeporte_tinc,nombre_tinc) VALUES  (2,'Falta');

	#Estadio
INSERT INTO estadio (nombre_estadio) VALUES  ('El Campo');
INSERT INTO estadio (nombre_estadio) VALUES  ('Santiago nou');

	#Entrenadores
INSERT INTO entrenadores (idtemporada_ent, idtentrenador_ent, nombre_ent, apellidos_ent, nacionalidad_ent) VALUES  (1, 1, 'Ivan', 'Ojeda', 'Montesco');
INSERT INTO entrenadores (idtemporada_ent, idtentrenador_ent, nombre_ent, apellidos_ent, nacionalidad_ent) VALUES  (2, 2, 'Miguel', 'Urbano', 'Çatalâ');

	#Equipo
INSERT INTO equipo (idtemp_eq, idestadio_eq, deporte_iddeporte, identrenador_eq, nombre_eq, ciudad_eq, provincia_eq, presidente_eq, liga_eq, division_eq) VALUES  (1,2,1,1, "Real Jaén", "Jaén", "Jaén", "Ángel José de los Santos Lopez", "Liga Santander", "1 división");
INSERT INTO equipo (idtemp_eq, idestadio_eq, deporte_iddeporte, identrenador_eq, nombre_eq, ciudad_eq, provincia_eq, presidente_eq, liga_eq, division_eq) VALUES  (2,2,1,2, "Villanueva del Arzobispo C.F", "Vva", "Jaén", "Aurelio Cano", "ACB", "2 división");

	#Jugador
INSERT INTO  jugador (idtemporada_jug, idposicion_jug, equipos_jug, nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug, numero_jug) VALUES  (1,1,1, "José Ángel",  "Lopez Santos", "Molina", '1998-07-09', "12675297F", "Mongolo", 27);
INSERT INTO  jugador (idtemporada_jug, idposicion_jug, equipos_jug, nombre_jug, apellido_jug, alias_jug, fechanac_jug, dni_jug, nacionalidad_jug, numero_jug) VALUES  (2,2,2, "Adrián",  "Ruiz Martínez", "PKT", '2000-07-13', "36579369Ñ", "Nicaragüense", 8);

	#Calendario/Partidos
	
INSERT INTO calendario (fecha_cal, local_cal, visitante_cal, jornada_cal, idestadio_cal, temporada_cal, goleslocal_cal, golesvisitante_cal) VALUES  ('2019-11-08', 1, 2,"1", 1, 1, 0, 17);
INSERT INTO calendario (fecha_cal, local_cal, visitante_cal, jornada_cal, idestadio_cal, temporada_cal, goleslocal_cal, golesvisitante_cal) VALUES  ('2019-11-22', 2, 1,"2", 1, 1, 18, 0);

	#Incidencias
	
INSERT INTO incidencia (idtincidencia_inc, idpartido_inc, idjugador_inc1, idjugador_inc2, tiempo_inc) VALUES  (1,1,1,2,"94");
INSERT INTO incidencia (idtincidencia_inc, idpartido_inc, idjugador_inc1, idjugador_inc2, tiempo_inc) VALUES  (2,2,2,1,"23");

	#Arbitra ( Calendario/partido - Arbitro)
	
INSERT INTO arbitra (idpartido_arbitra, idarbitro_arbitra) VALUES  (1,1);
INSERT INTO arbitra (idpartido_arbitra, idarbitro_arbitra) VALUES  (2,2);
