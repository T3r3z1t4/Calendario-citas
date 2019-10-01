use cita;

show full tables from cita;

drop table cita;

select * from iglesia;
select * from integrante;
select * from cita;
select * from integrante where idIglesia='3';
select * from integrante where cargo='pastor';

select nombre from iglesia;
SELECT nombre FROM iglesia;
SELECT horario FROM cita where fecha LIKE '2019-09-26';

SELECT nombre FROM iglesia;

select nombre
from integrante 
where idIglesia = 3;

SELECT nombre FROM integrante WHERE idIglesia=(select idIglesia from iglesia where idIglesia=1);

delete from integrante where idIntegrante = '14';

INSERT INTO iglesia (idIglesia, nombre, direccion, region)
VALUES (null,'Kevin', 'Jazmines 1', 'Sierra Sur');

INSERT INTO integrante (idIntegrante, idIglesia, nombre, direccion, telefono, correo, cargo)
VALUES (null, 3,'Yturiel', 'Hidalgo 6', '9513981261', 'kevin@gmail.com', 'Pastor');

INSERT INTO cita (idCita, idIntegrante, idIglesia, nombre, motivoCita, telefono, horario, fecha)
VALUES (null, 1, 1, 'Evelyn', 'Dental', '9513981261', '9-10', '2019/09/26');

UPDATE iglesia
SET nombre = 'sierra sur'
WHERE idIglesia = 3;





