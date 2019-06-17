# ANDIAMO

Aplicación web con estructura Model View Controller, la cual esta dividida en backend y frontend, en la parte de backend tenemos prettys url y se cargan las clases automaticamente.
En la parte de frontend usamos librerias como dropzone y toastr, se conecta con el apiconnector en el backend.

## TECNOLOGIAS 

- ANGULAR JS 1.4
- PHP 5.6
- MYSQL 5.6

## MODULOS

- **CONTACT** - Usamos [mailgun](https://www.mailgun.com/) para recibir correos de los clientes.

- **HOME** - Vemos un carousel, los productos mas destacados con un buscador y un botón para cargas más.

- **SHOP** 
    - *BUSCADOR* - Buscador filtrando por país.
    - *DESTINOS* - Destinos más destacados.
    - *PRECIO* - Filtrar productos por precio, usando la directiva [RZSlider](https://angular-slider.github.io/angularjs-slider/).
    - *SERVICIOS* - Filtrar productos por sus servicios.
    - *CARGAR* - Se muestran más productos al hacer scroll y con su paginación.
    - *DETALLES* - Al hacer click se pueden ver más detalles de cada producto.
    - *LIKE* - Se añade a tus likes el producto que te guste.

- **PROFILE** - Se puede ver y editar la información de nuestra cuenta, es decir, nuestros me gusta, nuestro avatar, nuestros datos...

- **LOGIN**
    - *SOCIAL LOGIN* - Iniciar sesión con [Auth0](https://auth0.com/) en Google o Github.
    - *REGISTRAR* - Registrar clientes usando [JWT Token](https://jwt.io/) para mayor seguridad y mailgun para activar la cuenta.
    - *CAMBIAR CONTRASEÑA* - Cambiamos nuestra contraseña a partir de nuesto usuario con ayuda de mailgun.
    - *INICIAR SESION* - Iniciamos la sesión con nuestro usuario y contraseña.

## OTROS ASPECTOS

- app.js 
- apiconnector.js
- autoload.php
- paths.php
- Un único servicio en el login que usa localstorage para guardar y consumir el token y el tipo de usuario.


