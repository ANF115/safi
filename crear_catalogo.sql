-- creando un catalogo, empresa_id es el id del usuario
INSERT INTO public.catalogos(
	 empresa_id, nombre_catalogo)
	VALUES (?, ?);
-- insertar cuenta mayor
INSERT INTO public.cuenta_mayors(
	 catalogo_id, codigo_cuenta_mayor, nombre_cuenta_mayor)
	VALUES (?, ?, ?);
-- insertar cuentas
INSERT INTO public.cuentas(
	 cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
	VALUES (?, ?, ?);
-- insertar subcuentas
INSERT INTO public.sub_cuentas(
	 cuenta_id, codigo_subcuenta, nombre_subcuenta)
	VALUES (?, ?, ?);