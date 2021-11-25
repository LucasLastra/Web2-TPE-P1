# Web 2 - Trabajo Práctico Especial Parte 1

Integrantes: Lastra Lucas.


TPE - Parte 1
Consigna
Desarrollar un sitio web dinámico que permita visualizar un conjunto de ítems cargados dinámicamente por un usuario administrador. Estos ítems deben estar modelados en el sistema mediante una relación 1 a N. Por ejemplo, se puede pensar como ítems pertenecientes a categorías, ítems que tienen un conjunto de componentes o cualquier modelo de datos deseado que se adapte a esta relación.
En adelante, se usará ítems y categoría para describir los requerimientos funcionales, pero cada grupo lo adaptará a su modelo de datos.

Descripción de datos:
Debe contar con una base de datos acorde al tipo de página a implementar. La base de datos debe tener al menos una relación 1-N. Por ejemplo, debe haber una categoría, y un nivel de ítem que es agrupado en la categoría. Las columnas de cada tabla deben ser acordes a la lógica de su página.
A continuación se dan ejemplos sugeridos que se pueden aplicar a muchas páginas, otras opciones son bienvenidas.
Comercial
Debe contar con las tablas Producto y Categoría. Un producto puede pertenecer sólo a una categoría.
Noticias
Debe contar con las tablas Noticia y Sección. Una noticia puede pertenecer sólo a una sección.
Autores y libros
Un conjunto de autores con los libros que escribieron.
Rutas y ciudades
Debe contar con las tablas Ciudad y Ruta. Una ruta puede llegar a varias ciudades.
Productos con especificaciones
Debe contar con las tablas Producto y Especificación. Una especificación pertenece a un producto.

CVs
Un listado de los potenciales empleados con sus distintas líneas en su currículum. Debe contar con las tablas Empleado y Línea.

Otras
Funciones en salas de cine, animales en reinos animales, películas según el estudio de filmación (o género), materias con su profesor a cargo (uno solo), temporadas y episodios, etc.
Requerimientos Funcionales
Acceso público 
Deben existir diferentes secciones donde se muestre el contenido dinámicamente generado desde la base de datos. Estas secciones pueden ser accedidas de manera pública, no es necesario loguearse.
Listado de ítems: Se debe poder visualizar todos los items cargados
Detalle de ítem: Se debe poder navegar y visualizar cada ítem particularmente 
Listado de categorías: Se debe poder visualizar un listado con todas las categorías cargadas
Listado de ítems x categoría: Se debe poder visualizar los ítems perteneciente a una categoría seleccionada
Importante: En cada ítem siempre se debe mostrar el nombre de la categoría a la que pertenece.



Acceso administrador de datos 
Debe existir una sección para la administración de datos, la cual es accedida solo a usuarios administradores del sitio.*
El usuario administrador debe loguearse con usuario y contraseña.
El usuario debe poder desloguearse (logout)
Solo los usuarios logueados pueden modificar las categorías y los ítems.
Se debe crear servici 	os de ABM (alta/baja/modificación) para administrar los datos:
Administrar Ítems (entidad del lado N de la relación).
Lista de Items (Noticias/Productos/…)
Agregar Items (Noticias/Productos/…)
Eliminar Items (Noticias/Productos/…)
Editar Items (Noticias/Productos/…)
Importante: 
Al agregar Items (Noticias/Productos/…) se debe poder elegir la categoría a la que pertenecen utilizando un select que muestre el nombre de la misma. 
Administrar Categorías (entidad del lado 1 de la relación)
Lista de Categorias
Agregar Categorias
Eliminar Categorias
Editar Categorias.
Requerimientos Técnicos (no funcionales)
Todos los HTML deben mostrarse utilizando un motor de plantillas (Smarty o similar)*.
Todas las acciones realizadas en la página deben estar manejadas utilizando el patrón MVC.
Las URL deben ser semánticas.
El sitio debe incluir un archivo sql para instalar la base de datos.

Entrega
La presentación es de acuerdo a los grupos definidos en la planilla correspondiente. La entrega se realizará en un repositorio público de GIT a elección del grupo. La URL debe estar subida a la planilla en la fecha de entrega pautada.
Planilla compartida
En la planilla de consigna se debe indicar las dos tablas (mínimo) y todos sus campos. Esto debe ser revisado con los ayudantes antes de comenzar a implementar.
Pautas de corrección
Se considera fundamental la aplicación de buenas prácticas, y la elección apropiada de cada tecnología para cada punto a resolver. Hacer prácticas marcadas como malas se considera motivo de pérdida de promoción y de puntaje de cursada.
En caso de no tener la planilla completa para la fecha fijada se perderá la promoción.
La exposición/defensa se realizará en una computadora dada por la cátedra, por lo que se recomienda probar la página web en diferentes computadoras.
En el caso de trabajos grupales, la defensa es de cada miembro por separado. Todos los integrantes deben poder responder a cualquier pregunta de cualquier parte del trabajo. En caso de errores graves se puede desaprobar el trabajo (lo que implica desaprobar la cursada). 

Notas
* Autenticación y seguridad: Se recomienda comenzar con la sección “privada” sin autenticación. Una vez dada la clase de seguridad del 27/09 es muy sencillo protegerlo con usuario y contraseña.
** Vistas: Se recomienda mantener una UI super sencilla hasta que se dé la clase de Templates Engine del 20/09






TPE - Parte 2
Consigna
Para la segunda entrega, se debe continuar el trabajo de la primera etapa.  El objetivo es agregar nueva funcionalidad detallada en forma de user stories abajo. Las stories se agrupan por tema sólo para facilitar la organización.

Roles de usuario:
Como usuario quiero poder registrarme en el sitio generando nombre de usuario/mail y contraseña. 
Al registrarse el usuario se loguea automáticamente. Este usuario no tiene privilegios de administración.
Como administrador del sitio, quiero poder asignar o quitar permisos de administración a cualquier usuario.
Como administrador del sitio, quiero poder eliminar usuarios.
Comentarios (todo por API REST):
Como usuario registrado, quiero poder postear comentarios en los ítems del sitio asignándoles un puntaje de 1 a 5. 
Cada ítem del sitio tendrá la posibilidad de recibir comentarios y puntuaciones solamente de usuarios logueados.
Como administrador del sitio, quiero poder borrar comentarios.


USER STORIES OPTATIVAS
Las User Stories optativas suman un punto cada uno. Se debe completar al menos una para acceder a la promoción ya que el resto del trabajo sin opcionales suma 6 puntos.

Como administrador del sitio, quiero poder asociar una imagen a un ítem.
Las imágenes de los “ítems” se deben poder subir y eliminar desde el ABM de los mismos.

Como usuario quiero poder navegar los listados de ítems en forma paginada.
Se debe generar una paginación del lado del servidor para recorrer los listados en forma paginada. (Se recomienda empezar con “anterior” y “siguiente”)

Como usuario quiero poder realizar búsquedas avanzadas de los ítems.
Se debe incluir un formulario de búsquedas avanzadas donde se filtren los ítems dependiendo de los atributos internos. Esta búsqueda se debe resolver del lado del servidor.
Como usuario quiero poder ordenar los comentarios por antigüedad o puntaje, ascendente o descendente. (Via API REST)
	Se debe ordenar del lado del servidor.
Como usuario quiero poder filtrar los comentarios por cantidad de puntos.  (Via API REST)
	Se debe filtrar del lado del servidor.



Aclaraciones
Respecto a los comentarios:
Todo el sistema de comentarios debe funcionar por medio de una API REST. Por ejemplo, cuando un usuario ingresa un comentario, el sitio no se debe recargar en su totalidad, solo el listado de comentarios.
Se debe renderizar todo lo relacionado a comentarios utilizando Client Side Render JS mediante la API REST.
Los comentarios se pueden ver siempre, pero sólo agregar por usuarios registrados y sólo borrar por administradores.
Los comentarios se deben poder crear. No es necesario poder modificarlos.

Respecto a los usuarios:
Existirán al menos dos roles de usuarios registrados. (administradores y no-administradores)
Los usuarios registrados no son administradores (a menos que se les dé el permiso luego)

Entrega
Se debe entregar en el mismo repositorio GIT del grupo.

Fecha: 
Entrega: Ver cronograma
Defensa:  Ver cronograma
Criterios de corrección
Se evaluará la correcta división de responsabilidades en las clases, no repetición de código, identificadores (nombres de clases, variables, etc) descriptivos, etc.
Los trabajos deben implementar la totalidad de la funcionalidad (ambas entregas) funcionando correctamente. 

User Story sin implementar: -2/-4 (según complejidad de la story).
User Story que no anda: -2.
User Story con bug menor: -1.
Poca Prolijidad General (código difícil de leer, mala división de clases, pero respetando MVC): hasta -3.
Sin chequeo de entradas en el servidor (isset && != ""): -1
No respeta MVC: desaprobado.
PDO inseguro: desaprobado.

Nota máxima: 10
