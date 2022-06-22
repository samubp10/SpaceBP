<x-app-layout>

    <div style="overflow-x:auto;">
        <table class="userTable">

            <tr>
                <th>{{ __('User identification') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Role') }}</th>
                <th>{{ __('Edit') }}</th>
                <th>{{ __('Delete') }}</th>


            </tr>
            @foreach ($users as $user)
                @if (Auth::user()->Role->idRole <= $user->Role->idRole && Auth::id() != $user->idUser)
                    <tr>
                        <td>{{ $user->idUser }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->Role->name }}</td>
                        <td>
                            <a href="{{ route('user.edit', ['locale' => app()->getLocale(), 'user' => $user]) }}">
                                <x-editSVG />
                            </a>

                        </td>
                        <td id="deleteRow">
                            <a href="{{ route('user.delete', ['locale' => app()->getLocale(), 'user' => $user]) }}">
                                <x-deleteSVG />
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
</x-app-layout>
