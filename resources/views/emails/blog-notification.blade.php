<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notificación de Contacto</title>
    </head>
    <body>
        <h1>Notificación de Contacto</h1>
        <p>Hola,</p>
        <p>Hemos recibido correctamente tu mensaje.</p>
        <p>Gracias por contactarnos. Nos pondremos en contacto contigo lo antes posible.</p>
        <p>Para ver nuestros post sobre el juego, visita el siguiente enlace:</p>
        <p><a href="{{ route('blog.index', ['id' => $blog->blog_id]) }}">Ver nuestros Blogs</a></p>
        <p>Gracias por tu interés.</p>
        <p>Saludos,</p>
        <p>Equipo del Blog</p>
        <p><strong>Nota:</strong> Este es un mensaje automático, por favor no respondas a este correo.</p>
    </body>
</html>
    