# Primera entrega: 5/06 - DASHCOURSE

## Presupuesto funcional

Alcaraciones:
- **Profesor**: Persona que publica clases en Cartelera.
- **User o Usuario**: Persona interesada en la inscripción de una clase o más.

### Secciones
El sitio cuenta con las siguientes **secciones**:

- Home o página principal.
- Clases que se van a Dictar.
    - Detalle por clase.
    - Inscripción.
- Perfil de Profesor.
    - Cursos por dar.
    - Agregar Clase.
- Perfil de User.
    - Clases por Asistir con los Datos.

### Análisis

**Lista de Requerimientos**:

- Para un Profesor agregar una Clase al sitio por primera vez, se debe registrar en el Sistema en la categoría **SOY PROFESOR**. Una vez que se completó el formulario de Registro y se generó su Usuario y Contraseña ya podrá hacerlo. (Datos que el Sistema va a Persistir)

- Para un User inscribirse a una Clase del sitio por primera vez, se debe registrar en el Sistema en la categoría **SOY USUARIO**. Una vez que se completó el formulario de Registro y se generó su Usuario y Contraseña ya podrá hacerlo. (Datos que el Sistema va a Persistir)

- Solamente los Usuarios registrados como Profesores pueden Agregar Clases, ver las clases que dará y en las mismas la Lista de los Participantes que tendrá.

- El sistema debe permitir que un Usuario que se encuentra logueado se inscriba en una clase, ingresando los datos de pago (Con Mercado Pago). Una vez realizado esto, se persistirán los datos para que el Profesor observe los Usuarios que asistirán a las clases.

- El sistema debe permitir que un Profesor que se encuentra logueado registre o agregue una nueva clase, ingresando todos los datos de la misma en el formulario: Nombre de la clase, Fecha y Horario en la que se va a dar la clase. La categoría de la clase, el precio si es paga y una imagen que represente la temática de la clase. Siempre las clases son en Vivo a través de un software de Videollamada como Zoom, Meet, Microsoft Teams, etc el cual deberá ingresar la plataforma que se utilizará. Estos datos den ser persistidos.

- El sistema debe permitir que una vez que un Usuario se inscribió en una clase (Que ya fue abonada) pueda acceder a los datos para el ingreso de la misma. Estos datos deben persistir para el acceso en día y fecha indicada.

- El sistema debe permitir que tanto Usuarios como Profesores puedan editar su ficha de datos personales del Perfil. 

- El sistema debe autorizar a un Profesor a Cancelar una clase.

## Presupuesto Temporal 

### Segunda entrega    -    19/06/20
- Implementación
    - Módulo de Usuarios - 3 días.
    - Módulo de Profesores - 3 días.
    - Módulo de Cursos - 5 días 
- Testing - 2 dias.

### Tercera entrega    -    24/06/20
- Puesta a punto - 5 días
- Preparación para la exposición - 1 día
- Publicación - 1 dia

## Wireframes
Se pueden observar los wireframes de las pantallas del proyecto Dashcourse dirigiéndose a : <br>
[Wireframes](wiref.md)

## Diagrama de clases

Se puede observar el Diagrama de Clases MVC dirigiéndose a : <br>

[Diagrama de Clases](Diagrama.md)

## Diseño del modelo de datos

Se puede observar el Modelo de Datos dirigiéndose a: <br>

[Modelo de Datos](Model.md)

## Site Map
Se puede observar el Site Map dirigiéndose a: <br>
[Site Map](SiteM.md)