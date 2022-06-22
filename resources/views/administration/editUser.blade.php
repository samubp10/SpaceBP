<x-app-layout>


    <form class="auth" action="{{ route('user.update', ['locale' => app()->getLocale(), 'user' => $user]) }}" method="post">
        @csrf
        <x-jet-validation-errors />

        {{-- <label class="form-label" for="fecha">Fecha:</label> --}}
        <input id="name" class="input1" type="text" name="name" value="{{ $user->name }}" placeholder="Name" required>

        <input id="email" class="input2" type="email" name="email" value="{{ $user->email }}" placeholder="Email" required>

        <input id="idRole" class="input3" type="number" name="idRole" value="{{ $user->idRole }}"  min="{{Auth::user()->idRole}}" max="3" required>

        <input id="send3" type="submit" value="Enviar">
    </form>


</x-app-layout>
