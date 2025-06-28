<?php
/** @var \App\Models\Blog $blog */
?>

Notificación de Contacto
Hola,
Hemos recibido correctamente tu mensaje.
Gracias por contactarnos. Nos pondremos en contacto contigo lo antes posible.
>Para ver nuestros post sobre el juego, visita el siguiente enlace:</p>
[{{ route('blog.index', ['id' => $blog->blog_id]) }}]Ver nuestros Blogs
Gracias por tu interés.
Saludos,
Equipo del Blog
Nota: Este es un mensaje automático, por favor no respondas a este correo.