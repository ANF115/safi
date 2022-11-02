# __Universidad Nacional de El Salvador__
## Facultad de Ingeniería y Arquitectura
### Análisis Financiero
### Ciclo II-2022


#### *__Integrantes__*
| __Carnet__ | __Nombre__ |__GD__|
| ---------- | ------------------------ | ----------- |
| AL18044 | Ronald Ernesto Ayala Lara | 2 |
| AL17015 | Mónica Anabel Anaya López | 1 |
| AP16001 | Diego Antonio Aguilar Pacheco | 1 |
| ML17017 | Diana Carolina Meléndez López | 2 |
| MM18057 | Andrea Melissa Monterrosa Morales | 2 |


### *__Requisitos para ejecutar proyecto__*
- Instalar [Docker Desktop](https://docs.docker.com/desktop/install/windows-install/)
- Instalar [VS Code](https://code.visualstudio.com/download)
- Intalar Extensión [Remote Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)


### *__Pasos__*
1. Descargar Repositorio
2. Abrir Repositorio en VS Code
3. Abrir la extensión Remote Containers __Esquina inferior Izquierda__
4. Seleccionar Reopen In Container


### *__Comandos__*
*__Servir Aplicación__*
```
php artisan serve

```
### * Comando para hacer modelos y crear migracion de una vez de ese modelo*
php artisan make:model Categoria -m

### * Comando para hacer componentes, si se quiere agregar otro componente a Categoria se pondra Categoria/Eliminar *
php artisan make:livewire Categoria/agregar

### * Comando para hacer seeder del modelo osea datos de llenado o de prueba*
php artisan make:seed CategoriaSeeder


[*__Bases de Datos__*](https://laravel.com/docs/9.x/database)

*__Migrar__*
```
php artisan migrate
```
*__Crear links almacenamiento__*
```
php artisan storage:link
```