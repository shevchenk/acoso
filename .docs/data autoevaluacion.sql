SELECT *
FROM autoevaluacion a
WHERE a.auto_id=454;

SELECT ad.aude_id, ad.aude_fecha_act, ad.aude_estado, e.esta_id, e.esta_titulo, e.esta_imagen, a.auto_estado, e.dime_id, ad.auto2_id, a2.auto_estado AS auto2_estado
FROM autoevaluacion_detalle ad
INNER JOIN estandar e ON e.esta_id = ad.esta_id
INNER JOIN autoevaluacion a ON a.auto_id= ad.auto_id 
LEFT JOIN autoevaluacion a2 ON a2.auto_id = ad.auto2_id 
WHERE ad.auto_id=454;



SELECT *
FROM estandar 
WHERE esta_id BETWEEN 4352 AND 4362	




SELECT *
FROM autoevaluacion
WHERE auto_id = 454;

SELECT *
FROM autoevaluacion_detalle
WHERE auto_id = 454;
