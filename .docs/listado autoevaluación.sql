SELECT a.acre_id, i.inst_nombre, c.carr_nombre, a.acre_cui, a.acre_fecha_reg, oa.obac_nombre
FROM acreditado a 
INNER JOIN objeto_acreditacion oa ON oa.obac_id = a.obac_id
INNER JOIN acreditado_institucion ai ON ai.acre_id = a.acre_id
INNER JOIN institucion i ON i.inst_id = ai.inst_id
INNER JOIN acreditado_carrera ac ON ac.acin_id = ai.acin_id
INNER JOIN carrera c ON c.carr_id = ac.carr_id
INNER JOIN acreditado_user au ON au.acre_id = a.acre_id AND au.user_id = 1
WHERE i.inst_id = 1;


SELECT i.inst_nombre, i.inst_web, i.inst_region, i.inst_prov, i.inst_dist, ti.tiin_nombre, ti.tiin_abrev
FROM institucion i
INNER JOIN tipo_institucion ti ON ti.tiin_id = i.tiin_id ;


SELECT a.auto_id, ta.tiau_nombre, a.auto_informe, a.auto_fecha_inicio, a.auto_fecha_fin, a.auto_estado, a.auto_completa
FROM autoevaluacion a 
INNER JOIN tipo_autoevaluacion ta ON ta.tiau_id = a.tipo_id
INNER JOIN acreditado_evento ae ON ae.acev_id = a.acev_id
WHERE auto_estado IN ('activo')
WHERE ae.acre_id = 34;


SELECT `ta`.`tiau_nombre`, `a`.`auto_informe`, `a`.`auto_fecha_inicio`, `a`.`auto_fecha_fin`, `a`.`auto_estado`, `a`.`auto_completa` 
FROM `autoevaluacion` AS `a` 
INNER JOIN `tipo_autoevaluacion` AS `ta` ON `ta`.`tiau_id` = `a`.`tipo_id` 
INNER JOIN `acreditado_evento` AS `ae` ON `ae`.`acev_id` = `a`.`acev_id` 
WHERE (`ae`.`acre_id` = 71) ORDER BY `a`.`auto_fecha_inicio` DESC