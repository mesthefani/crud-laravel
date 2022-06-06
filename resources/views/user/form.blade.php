<label for="name"> Username </label>
    <input type="text" name="name" value="{{ $user->name ?? ''}}" id="name">
    <br>
    <label for="email"> Email </label>
    <input type="text" name="email" value="{{ $user->email ?? '' }}"" id="email">
    <br>
    <label for="password"> Password </label>
    <input type="password" name="password" value="{{ $user->password ?? '' }}"" id="password">
    <br>
    <!--<label for="email_verified_at"> Confirm Password </label>
    <input type="text" name="email_verified_at" value="{{ $user->email_verified_at ?? '' }}"" id="email_verified_at">
    <br>-->
    <label for="avatar"></label>
    @if(isset($user->avatar))
    <img src="{{ asset('storage').'/'.$user->avatar}}" width=100 alt="">
    @endif
    <input type="file" name="avatar" value="" id="avatar">
    <br>

    <input type="submit" value="Guardar Datos">

    <a href="{{ url('/user') }}"> Regresar </a>
    <br>




