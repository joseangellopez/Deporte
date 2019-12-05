	#costraseña
INSERT INTO `contrasenas` (`contrasena`, `fecha_modificacion`) VALUES  ('1234', '2019-11-25 00:00:00');
INSERT INTO `contrasenas` (`contrasena`, `fecha_modificacion`) VALUES  ('1994', '2019-11-22 12:00:00');
INSERT INTO `contrasenas` (`contrasena`, `fecha_modificacion`) VALUES  ('Micentro2020', '2016-10-25 00:00:00');
	#usuarios

INSERT INTO `usuarios` (`usuario`, `nombre_usu`,`apellido_usu`,`fecha_nac_usu`,`n_telefono_usu`,`id_contrasena_usu`) VALUES  ('manolitog', 'Manuel','gonzalez','1920-02-29','710598548',3);
INSERT INTO `usuarios` (`usuario`, `nombre_usu`,`apellido_usu`,`fecha_nac_usu`,`n_telefono_usu`,`id_contrasena_usu`) VALUES  ('seryi4j', 'Sergio','ronzalez','1994-06-04','685692216',2);
INSERT INTO `usuarios` (`usuario`, `nombre_usu`,`apellido_usu`,`fecha_nac_usu`,`n_telefono_usu`,`id_contrasena_usu`) VALUES  ('donfernando', 'Fernando','Nos vamos','2016-03-21','610598548',1);

	#Deportes_sel
INSERT INTO deportes_sel (id_usuario_dep,futbol_dep,baloncesto_dep,futbol_sala,balonmano_dep) values (1,0,0,1,0);
INSERT INTO deportes_sel (id_usuario_dep,futbol_dep,baloncesto_dep,futbol_sala,balonmano_dep) values (2,1,1,1,1);
INSERT INTO deportes_sel (id_usuario_dep,futbol_dep,baloncesto_dep,futbol_sala,balonmano_dep) values (3,1,0,0,0);

	#metodos de pago
INSERT INTO metodo_pago (id_usuario_emt,tarjeta_met,cvv_met,fecha_caducidad_met) values (2,"5963279174611001",123,'2019-12-31');
INSERT INTO metodo_pago (id_usuario_emt,tarjeta_met,cvv_met,fecha_caducidad_met) values (3,"2963279174611001",223,'2020-12-31');
INSERT INTO metodo_pago (id_usuario_emt,tarjeta_met,cvv_met,fecha_caducidad_met) values (1,"4963279174611001",323,'2022-12-31');

#transacciones

INSERT INTO transacciones (id_usuario_transaccion,importe_transaccion,fecha_transaccion) values (1,15.89,'2018-08-25');
INSERT INTO transacciones (id_usuario_transaccion,importe_transaccion,fecha_transaccion) values (2,55.89,'2015-08-25');
INSERT INTO transacciones (id_usuario_transaccion,importe_transaccion,fecha_transaccion) values (3,115.89,'2019-08-25');