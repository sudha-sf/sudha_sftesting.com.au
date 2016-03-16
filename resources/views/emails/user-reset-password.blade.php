<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{"Testmate Portal"}}</title>
    </head>
    <body>
        <p style="text-align: center;"><img src="{{url('/testmate/images/testmate-logo.png')}}" style="max-width: 150px; max-height: 50px;"></p>

        <p>Hi {{$fullname}},</p>

        <p>You have been reset your password.</p>
        <p>Please use this password for login: {{$newPass}}</p>

        <p>Testmate Team</p>
        <p>Best regards,</p>
    </body>
</html>