# Registro de Ususario en Laravel

Registro de Ususario en laravel con un poco de bootstrap

Debe tener 3 roles:
- Superadministrador
- Administrador
- Usuario

El sistema debe contar con autenticacion de usuarios
Los usuarios deben ser registrados por pais

- Rol SuperAdmin
    - puede registrar usuarios de cualquier rol o pais.
    - Puede editar/borrar a todos los usuarios menos del mismo rol    
    - puede registrar paises (Minimo 5)
    - debe ver cuantos usuarios hay por pais (en highcharts puntos extra)

- Rol Admin
    - Puede registrar usuarios pero solo del mismo  pais (listo)
    - Puede editar/ borrar usuarios menos del mismo rol    
    - NO puede registar superadmins  (listo)

- Rol Usuario
    - No puede registrar usuarios (listo)
    - Ve el listado de usuarios de su pais (listo)
    - No puede editar/borrar usuarios (listo)
    - Solo puede editar sus propios datos