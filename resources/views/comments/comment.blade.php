<tr>
  <td>
    {{ $comment->body }}
  </td>
  <td>
    {{ $comment->user->name }}
  </td>
  <td>
    <form action="{{ route('admin.comments.change_status', $comment->id) }}" method="POST">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      @if($comment->visible)
        <input type="submit" class="btn btn-success" value="Visible">
      @else
        <input type="submit" class="btn btn-danger" value="Hidden">
      @endif
    </form>
  </td>
</tr>
