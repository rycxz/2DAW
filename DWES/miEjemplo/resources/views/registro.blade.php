<body>
<!--
fotoPerfil
-->
<div class="container">
    <h2>Registro de Usuario - Cocina</h2>
    <form action="/registro" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Apodo -->
        <div class="form-group">
            <label for="apodo">Apodo</label>
            <input type="text" id="apodo" name="apodo" <?php if(!$errors->has('apodo')){ echo 'value="'.old('apodo').'"'; }?> required>
            @error('apodo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Nombre -->
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" required>
            @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Apellidos -->
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" value="{{old('apellidos')}}" required>
            @error('apellidos')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Correo Electrónico -->
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" <?php if(!$errors->has('email')){ echo 'value="'.old('email').'"'; }?> required>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contrasena" <?php if(!$errors->has('contrasena')){ echo 'value="'.old('contrasena').'"'; }?> required>
            @error('contraseña')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirmar Contraseña -->
        <div class="form-group">
            <label for="confirmar_contraseña">Confirmar Contraseña</label>
            <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" required>
            @error('confirmar_contraseña')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Experiencia -->
        <div class="form-group">
            <label for="experiencia">¿Cuál es tu nivel de cocina?</label>
            <select id="experiencia" name="experiencia" required>
                <option value="Principiante" <?php if(!$errors->has('experiencia') && old('experiencia')=='Principiante'){ echo 'selected'; }?>>Principiante</option>
                <option value="Amateur" <?php if(!$errors->has('experiencia') && old('experiencia')=='Amateur'){ echo 'selected'; }?>>Amateur</option>
                <option value="Profesional" <?php if(!$errors->has('experiencia') && old('experiencia')=='Profesional'){ echo 'selected'; }?>>Profesional</option>
            </select>
            @error('experiencia')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Foto perfil -->
        <div class="form-group">
            <label for="file">Foto de perfil</label>
            <input type="file" id="foto" name="fotoPerfil" accept="image/*" <?php if(!$errors->has('foto')){ echo 'value="'.old('foto').'"'; }?>>
        </div>

        <!-- Botón de Envío -->
        <div class="form-group">
            <input type="submit" value="Registrar">
        </div>
    </form>
</div>

</body>
