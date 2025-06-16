<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>

<body>
    <p>Hola 👋 {{ $invitationLink->id }}</p>
    <p>Hola 👋 {{ $invitationLink->fk_collaborator_role_id }}</p>

    <p>Hola 👋 {{ $invitationLink->collaboratorRole->name }}</p>
    <p>Hola 👋 {{ $invitationLink->collaboratorRole->collaborator_role_id }}</p>

    <p>Bienvenido al proceso de contratación.</p>

    <p>Para continuar, por favor haz clic en el siguiente enlace:</p>

    <p><a href="{{ $url }}" target="_blank">Completa tu información aquí</a></p>

    <p>Este enlace estará activo durante 3 días.</p>

    <p>Saludos,<br>SGTech</p>
</body>

</html>
