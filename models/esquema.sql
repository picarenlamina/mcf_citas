DROP TABLE IF EXISTS citas_reservas;
DROP TABLE IF EXISTS citas_usuarios;
DROP TABLE IF EXISTS citas_citas;



create table citas_citas(
cita_id integer primary key AUTO_INCREMENT,
fecha date,
hora TIME
);

create table citas_usuarios(
usuario_id integer primary key AUTO_INCREMENT,
nif varchar( 100 ),
nombre varchar( 100 ),
apellidos varchar( 100 ),
telefono varchar(100),
email varchar(100)
);


create table citas_reservas(
reserva_id integer primary key AUTO_INCREMENT,
cita_id integer,
usuario_id integer,
foreign key (cita_id) references citas_citas(cita_id ),
foreign key (usuario_id) references citas_usuarios( usuario_id )
);

insert into citas_citas values ( 1, "2023-11-25", "11:00" );
insert into citas_citas values ( 2, "2023-11-25", "12:00" );
insert into citas_citas values ( 3, "2023-11-25", "13:00" );
insert into citas_citas values ( 4, "2023-11-25", "14:00" );
insert into citas_citas values ( 5, "2023-11-25", "15:00" );
insert into citas_citas values ( 6, "2023-11-25", "16:00" );



