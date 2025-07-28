# asistencia

Aplicación para la toma de asistencias de alumnos.

Esta versión incluye una implementación básica en Vue 2 que utiliza Vuex y Vue Router.
Para probarla de forma local sólo es necesario servir la carpeta `vue-app` junto con los archivos PHP del directorio `api/`.

## Ejecución

1. Levante un servidor PHP en la raíz del repositorio para exponer los endpoints:

   ```bash
   php -S localhost:8000
   ```

2. Sirva el directorio `vue-app` (por ejemplo con `npx http-server`) o abra `index.html` directamente en el navegador.

Al autenticarse se consultará `api/login.php` y luego `api/cursos_alumnos.php` para mostrar los cursos y alumnos asignados.

La autenticación se realiza mediante `api/login.php` y los cursos y alumnos asociados al preceptor autenticado se consultan con `api/cursos_alumnos.php`.
