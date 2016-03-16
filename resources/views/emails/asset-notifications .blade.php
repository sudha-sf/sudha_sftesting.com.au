<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{"Testmate Portal"}}</title>
    </head>
    <body>
        <p style="text-align: center;"><img src="{{url('/testmate/images/testmate-logo.png')}}" style="max-width: 150px; max-height: 50px;"></p>

        <p>Hi {{$full_name}},</p>

        <p>You have a new comment for the {{$assetName}} in the {{$projectName}}.</p>
        <p>Please click here to access the link: <a href="{{$access_link}}">{{$title}}</a></p>

        <p>Testmate Team</p>
        <p>Best regards,</p>
    </body>
</html>