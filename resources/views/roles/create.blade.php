<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="{{ route('roles.store') }}">
    @csrf
    <div>
        <label for="title">name of role</label>
        <input name="name" type="text" id="title">
    </div>
    <div>
        <input type="submit"  value="Envoyer">
    </div>
</form>
</body>
</html>