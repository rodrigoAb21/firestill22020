<form action="/sender" method="post">
    <input type="text" name="text">
    {{csrf_field()}}
    <input type="submit">
</form>