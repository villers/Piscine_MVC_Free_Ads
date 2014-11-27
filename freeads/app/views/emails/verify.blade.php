<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Vérification de l'adresse email</h2>

        <div>
            Merci pour votre inscription. Vous devez cliquer sur le lien suivant pour valider votre compte
           <a href="{{ URL::to('validate/'.$confirmation_code) }}">{{ URL::to('validate/'.$confirmation_code) }}</a>.<br/>

        </div>

    </body>
</html>