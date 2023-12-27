<!-- resources/views/partials/user_tree.blade.php -->


    @foreach ($usersTree as $key=> $user)
        <li>
            <span><a href="{{route('userTree',$user->id) }}"> {{ $user->name   }}</a></span>
            <!-- {{ $user->name }} -->
            @if (!empty($user->referred_users))
                <ul>
                    @include('partials.user_tree', ['usersTree' => $user->referred_users])
                </ul>
            @endif
        </li>
    @endforeach


