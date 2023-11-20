       <a href="{{ route('admin.users.edit-password', $id) }}" class="btn btn-info btn-sm  mt-1"><i
               class="fa fa-key"></i></a>
       <a href="{{ route('admin.users.edit', $id) }}" class="btn btn-success btn-sm ml-1 mt-1"><i class="fa fa-edit"></i>
       </a>
       <a href="{{ route('admin.users.show', $id) }}" class="btn btn-primary btn-sm mt-1"><i class="fa fa-eye"></i> </a>
       <form action="{{ route('admin.users.destroy', $id) }}" class="" method="post"
           style="display: inline-block;">
           <input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden"
               value="{{ csrf_token() }}">
           <button type="submit" class="btn btn-danger btn-sm  btn-jinja-delete ml-1 mt-1"><i class="fa fa-trash"></i>
           </button>
       </form>
