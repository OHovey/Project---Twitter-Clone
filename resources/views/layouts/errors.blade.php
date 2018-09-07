@if (count($errors))

    @foreach ($errors->all() as $error)

        <li class="alert aler-danger">

            {{ $error }}

        </li>

    @endforeach

@endif