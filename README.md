# SpaceBP 
Una página web en la que podrás aprender y saber sobre las últimas noticias del universo que nos rodea. 

A web page where you can learn and know about the latest news about the outer space.

<h1>Anteproyecto</h1>
Todo lo escrito a partir de aquí está sujeto a cambios.
<h2>Landing page</h2>

<ul>
    <li>La "landing page" tendrá lo siguiente:</li>
    <ul>
        <li>1 enlace para el "Sign in" o "autenticación"</li>
        <li>1 enlace para el "Sign up" o "Registro"</li>
    </ul>
    <li>Tendrá un vídeo de fondo de temática espacial</li>
    <li>En el centro de la página tendrá una breve descripción del sitio web</li>
</ul>

![Landing-page](https://user-images.githubusercontent.com/73947252/160785855-7cb0a2ee-45c9-46bb-8e7f-09e498adc848.png)

<h2>Páginas de autenticación y de registro</h2>
<ul>
    <li>
        En las páginas de autenticación y registro tendrán sus respectivos campos (con esto me refiero a los típicos campos de nombre usuario, contraseña, email, ...).
    </li>
    <li>
        En la página de registro tendrá el añadido de que el usuario podrá subir una foto de perfil.
    </li>
</ul>

<h2>Sobre el usuario</h2>

<ul>
    <li>
        El usuario tendrá una foto de perfil.
    </li>
    <li>
        Tendrá un apartado con sus fotos favoritas (las que se ha guardado).
    </li>
    <li>
        Tendrá un apartado con sus noticias favoritas (las que se ha guardado).
    </li>
</ul>

![Fotos-Favoritas](https://user-images.githubusercontent.com/73947252/160790050-5712f5e1-1e76-491f-bd15-a89b3c92ee18.png) ![Noticias-Favoritas](https://user-images.githubusercontent.com/73947252/160790087-7df53f0f-2a22-48a2-8206-d6e27578f770.png)

<h3>Roles de usuarios</h3>
<h4>Administrador</h4>
<ul>
    <li>
        El usuario administrador podrá eliminar, editar y crear, tanto noticias como las fotos de la galería.
    </li>
    <li>
        Aún está por ver si este usuario puede o no guardarse noticias y fotos en su perfil.
    </li>
</ul>

<h4>Usuario normal</h4>
<ul>
    <li>
        Este usuario podrá ver sus noticias e imágenes guardadas en su perfil.
    </li>
</ul>

<h2>Páginas dentro de la aplicación</h2>

El fondo de esta páginas será un fondo negro, en el que irán apareciendo svg con forma de estrellas de forma aleatoria por el fondo.

<ul>
    <h3>Noticias</h3>
    <ul>
        <li>
            En otra de las páginas lo que habrá serán noticias importantes sobre el mundo de la astronomía, como despegues o novedades en naves, etc. El usuario podrá almacenar, o darle favorito a una de estas noticias y quedarán guardadas en perfil. Este punto me gustaría hacerlo con la ayuda de una api  que de información sobre este tema.
        </li>
    </ul>
</ul>

<ul>
    <h3>Galería</h3>
    <ul>
        <li>
            En unas de las páginas habrá una galería de imágenes en las que al pulsar, se abrirá un cuadro que contendrá un texto en el que pondrá el título de la foto, la descripción en sí y el nombre del autor.
        </li>
    </ul>
</ul>

<ul>
    <h3>Sistema solar</h3>
    <ul>
        <li>
            Usando un framework para hacer páginas en 3D (A-FRAME seguramente), intentaré hacer un sistema solar, con el que se podrán ver los planetas, sus recorridos e información sobre ellos.
        </li>
    </ul>
</ul>

<br />
<li> Dentro de la página web habrá un botón para poner/quitar música.</li>
<li>
    Donde hay un recuadro en el que pone perfil, estará la foto de usuario empequeñecida.
</li>

</ul>

![Noticias](https://user-images.githubusercontent.com/73947252/160790519-b0cfe54e-6e5a-4d99-8b45-a7598dfcebf6.png) ![Galeria](https://user-images.githubusercontent.com/73947252/160790546-ecc41563-4aeb-4aaf-9e20-f555f4ac538a.png) ![Maqueta del sistema
solar](https://user-images.githubusercontent.com/73947252/160790748-75a3ff84-927e-4fac-bd66-60ee1aa33a7f.png)




<h2>Enlace al prototipo/esquema de mi página web</h2>
He de aclarar que este es meramente un boceto, la página web va a tener un aspecto totalmente diferente a este. Este prototipo solo sirve para saber como va a estar estructurada la página. https://www.figma.com/file/EaCTyHyz2zIQh3lrWcPsyQ/Prototipo-Proyecto-final?node-id=0%3A1

<h2>Diagrama E/R</h2>
Las relaciones muchos a muchos entre usuarios - fotos y usuarios - noticias, son las noticias y los usuarios guardados

![DiagramaER](https://user-images.githubusercontent.com/73947252/160834805-3bb2de36-bc5d-4c8a-b958-fd7c9f8f88e5.png)
