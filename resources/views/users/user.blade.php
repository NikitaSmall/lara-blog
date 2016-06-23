<tr>
  <td>
    {{ $user->name }}
  </td>
  <td>
    {{ $user->email }}
  </td>
  <td>
    {{ $user->role->name }}
  </td>
  <td>
    @if($user->role->name != 'user')
      <form method="POST" action="{{ route('admin.users.to_user', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="submit" class="btn btn-default" value="Change role to user">
      </form>
    @else
      User has `user's` rights right now.
    @endif
  </td>
  <td>
    @if($user->role->name != 'moderator')
      <form method="POST" action="{{ route('admin.users.to_moderator', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="submit" class="btn btn-default" value="Change role to moderator">
      </form>
    @else
      User has `moderator's` rights right now.
    @endif
  </td>
  <td>
    @if($user->role->name != 'admin')
      <form method="POST" action="{{ route('admin.users.to_admin', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="submit" class="btn btn-default" value="Change role to admin">
      </form>
    @else
      User has `admin's` rights right now.
    @endif
  </td>
</tr>
