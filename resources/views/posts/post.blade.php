<tr>
  <td>
    {{ $post->title }}
  </td>
  <td>
    {{ $post->user->name }}
  </td>
  <td>
    @if(Auth::user()->isAdmin())

        <form action="{{ route('admin.posts.change_status', $post->id) }}" method="POST">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          @if($post->published)
            <input type="submit" class="btn btn-success" value="published">
          @else
            <input type="submit" class="btn btn-danger" value="unpublished">
          @endif
        </form>

    @else
      @if($post->published)
        <div class="btn btn-success">published</div>
      @else
        <div class="btn btn-danger">unpublished</div>
      @endif
    @endif
  </td>
  @if(Auth::user()->isAdmin() || Auth::user()->id == $post->user_id)
    <td>
      <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-default">Edit post</a>
    </td>
    <td>
      <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <input type="submit" class="btn btn-danger" value="Delete!">
      </form>
    </td>
  @else
    <td colspan="2">
      You don't have rights to edit this post.
    </td>
  @endif
</tr>
