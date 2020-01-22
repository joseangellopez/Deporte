CREATE DEFINER = CURRENT_USER TRIGGER `proyecto`.`Temporada_equipo_BEFORE_INSERT` after INSERT ON `Temporada_equipo` FOR EACH ROW
BEGIN
insert into clasificacion values (new.idtemporada_temeq, new.idequipo_temeq, 0,0,0,0,0,0,0);
END
-----------------------------------------------------
CREATE DEFINER = CURRENT_USER TRIGGER `proyecto`.`Calendario_AFTER_INSERT` AFTER INSERT ON `Calendario` FOR EACH ROW
BEGIN

#if clasificacion.idequipo_cla = new.local_cal then
if new.goleslocal_cal > new.golesvisitante_cal then 
update clasificacion set goles_favor_cla = goles_favor_cla + new.goleslocal_cal, goles_contra_cla = goles_contra_cla + new.golesvisitante_cal, numero_partidos_cla = numero_partidos_cla + 1,partidos_ganados_cla =  partidos_ganados_cla + 1 where idequipo_cla = new.local_cal; 
elseif new.goleslocal_cal < new.golesvisitante_cal then 
update clasificacion set goles_favor_cla = goles_favor_cla + new.goleslocal_cal, goles_contra_cla = goles_contra_cla + new.golesvisitante_cal, numero_partidos_cla = numero_partidos_cla + 1,partidos_perdidos_cla =  partidos_perdidos_cla + 1 where idequipo_cla = new.local_cal; 
else update clasificacion set goles_favor_cla = new.goleslocal_cal, goles_contra_cla = goles_contra_cla + new.golesvisitante_cal, numero_partidos_cla = numero_partidos_cla + 1,partidos_empatados_cla =  partidos_empatados_cla + 1 where idequipo_cla = new.local_cal;   
 end if;
 #elseif clasificacion.idequipo_cla = new.visitante_cal then
 if new.goleslocal_cal < new.golesvisitante_cal then 
update clasificacion set goles_favor_cla = goles_favor_cla + new.golesvisitante_cal, goles_contra_cla = goles_contra_cla + new.goleslocal_cal, numero_partidos_cla = numero_partidos_cla + 1,partidos_ganados_cla =  partidos_ganados_cla + 1 where idequipo_cla = new.visitante_cal; 
elseif new.goleslocal_cal > new.golesvisitante_cal then 
update clasificacion set goles_favor_cla = goles_favor_cla + new.golesvisitante_cal, goles_contra_cla = goles_contra_cla + new.goleslocal_cal, numero_partidos_cla = numero_partidos_cla + 1,partidos_perdidos_cla =  partidos_perdidos_cla + 1 where idequipo_cla = new.visitante_cal; 
else update clasificacion set goles_favor_cla = goles_favor_cla + new.golesvisitante_cal, goles_contra_cla = goles_contra_cla + new.goleslocal_cal, numero_partidos_cla = numero_partidos_cla + 1,partidos_empatados_cla =  partidos_empatados_cla + 1 where idequipo_cla = new.visitante_cal;   
 end if;
 #end if;
END
