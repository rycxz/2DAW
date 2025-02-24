<form method="post" action="/login">
    @csrf
    <input type="text" name="apodo" value="{{old('apodo')}}">
    @error('apodo')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="password" name="contrasena">
    <input type="submit" value="Enviar">
</form>

