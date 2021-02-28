<form action="/sender" method="post">
    {{csrf_field()}}
    <input type="text" name="datos">
    <input type="submit">
</form>