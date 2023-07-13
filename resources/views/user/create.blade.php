<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('user/store') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="email">email</label>
        <input type="text" id="email" name="email">
        <br>
        <label for="password">password</label>
        <input type="text" id="password" name="password">
        <br>
        <label for="country">country</label>
        <input type="text" id="country" name="country">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
