-- creando un catalogo, empresa_id es el id del usuario
INSERT INTO public.catalogos(
	 id, empresa_id, nombre_catalogo)
	VALUES (3000, 9, 'Catálogo de Pollo Campero');
-- insertar cuenta mayor
INSERT INTO public.cuenta_mayors(
	 id, catalogo_id, codigo_cuenta_mayor, nombre_cuenta_mayor)
	VALUES (3000,3000,'1','Activo');
    -- insertar cuentas
    INSERT INTO public.cuentas(
        id, cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
        VALUES (3000,3000,'1','Activos Corrientes');
        -- insertar subcuentas
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3000, 3000, '1', 'Efectivo y Equivalente');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3001, 3000, '2', 'Cuentas por cobrar');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3002, 3000, '3', 'Prestamos y anticipios a empleados');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3003, 3000, '4', 'Deudores varios');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3004, 3000, '5', 'Pagos anticipados');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3005, 3000, '6', 'Pago a cuenta');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3006, 3000, '7', 'Crédito Fiscal IVA');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3007, 3000, '8', 'Invertarios');
    INSERT INTO public.cuentas(
        id, cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
        VALUES (3001,'1','2','Activos No Corrientes');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3008, 3001, '1', 'Propiedad, Planta y Equipos');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3009, 3001, '2', 'Depreciación Acumulada');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3010, 3001, '3', 'Seguros pagados anticipados y diferidos');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3011, 3001, '4', 'Intangibles');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3012, 3001, '5', 'Depositos de Garantía');
INSERT INTO public.cuenta_mayors(
	 id, catalogo_id, codigo_cuenta_mayor, nombre_cuenta_mayor)
	VALUES (3001,3000,'2','Pasivos');
    -- insertar cuentas
    INSERT INTO public.cuentas(
        id, cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
        VALUES (3002, 3001, '1', 'Pasivos Corrientes');
        -- insertar subcuentas
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3013, 3001, '2', 'Proveedores');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3014, 3001, '3', 'Acreedores');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3015, 3001, '4', 'Retenciones');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3016, 3001, '5', 'Impuestos por Pagar');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3017, 3001, '6', 'Provisión Laboral');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3018, 3001, '7', 'Prestamos a corto plazo');
    -- insertar cuentas
    INSERT INTO public.cuentas(
        id, cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
        VALUES (3003, 3001, '2', 'Pasivos No Corrientes');
        -- insertar subcuentas
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3019,3003, '1', 'Prestamos a largo plazo');
INSERT INTO public.cuenta_mayors(
	 id, catalogo_id, codigo_cuenta_mayor, nombre_cuenta_mayor)
	VALUES (3002,3000,'3','Capital');
    -- insertar cuentas
    INSERT INTO public.cuentas(
        id, cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
        VALUES (3004,3002, '1', 'Capital Social, Reserva y Utilidades');
        -- insertar subcuentas
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3020,3004,'1', 'Capital Social');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3021,3004,'2', 'Reservas');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3022,3004,'3', 'Utilidades no distribuidas');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3023,3004,'4', 'Utilidad del Ejercicio');

INSERT INTO public.cuenta_mayors(
	 id, catalogo_id, codigo_cuenta_mayor, nombre_cuenta_mayor)
	VALUES (3003,3000,'4','Cuentas de resultados Acreedoras');
    INSERT INTO public.cuentas(
        id, cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
        VALUES (3005,3003, '1', 'Ingresos de operación');
        INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3024,3005,'1', 'Ventas');
INSERT INTO public.cuenta_mayors(
	 id, catalogo_id, codigo_cuenta_mayor, nombre_cuenta_mayor)
	VALUES (3004,3000,'5','Cuentas de resultados Deudoras');
    INSERT INTO public.cuentas(
        id, cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
        VALUES (3006,3004, '1', 'Costos y Gastos de Operación');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3025,3006,'1', 'Costos de ventas');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3026,3006,'2', 'Gastos de Ventas');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3027,3006,'3', 'Gastos de Administración');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3028,3006,'4', 'Impuestos sobre la renta');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3029,3006,'5', 'Gastos Financieros');
INSERT INTO public.cuenta_mayors(
	 id, catalogo_id, codigo_cuenta_mayor, nombre_cuenta_mayor)
	VALUES (3005,3000,'6','Cuentas liquidadoras o de cierre');
    INSERT INTO public.cuentas(
        id, cuenta_mayor_id, codigo_cuenta, nombre_cuenta)
        VALUES (3007,3005, '1', 'Perdidas y Ganacias');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3030,3007,'1', 'Utilidad Neta');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3031,3007,'2', 'Utilidad Bruta');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3032,3007,'3', 'Utilidad Operativa');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3033,3007,'4', 'Utilidad Financiera');
         INSERT INTO public.sub_cuentas(
            id, cuenta_id, codigo_subcuenta, nombre_subcuenta)
            VALUES (3034,3007,'5', 'Utilidad Antes de impuestos');