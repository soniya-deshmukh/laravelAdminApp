
<footer class="footer">Copy right @ Admin Strip &copy;2020</footer>
</body>
</html>
<!-- The Modal AddPage -->
<div class="modal" id="addPage">
  <div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <form id="add_page" action="{{ route('pages.store') }}" method="POST">
            @csrf
            <div class="modal-header">
            <h5 class="modal-title" >Add page</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</span>
            </button>
            </div>
        <!-- Modal body -->
            <div class="modal-body">
                    <div class="div formgroup">
                        <label for="page_title">Page Title</label>
                        <input type="text" name="page_title" class="form-control" placeholder="Page Title" value="{{ old('page_title') }}">
                        @if ($errors->has('page_title'))
                        <span class="text-danger">{{ $errors->first('page_title') }}</span>
                        @endif
                    </div>
                    <div class="div formgroup">
                        <label for="page_body">Page Body </label>
                        <textarea name="page_body" class="form-control" placeholder="Page Body">{{ old('page_body') }}</textarea>
                        @if ($errors->has('page_body'))
                        <span class="text-danger">{{ $errors->first('page_body') }}</span>
                        @endif
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name="is_published" id="" class="" @if(old('is_published')=="on") checked @endif>
                        <label>Published</label>
                    </div>
                    <div class="div formgroup">
                        <label for="meta_tag">Meta Tags </label>
                        <input type="text" name="meta_tag" class="form-control" placeholder="Add some Tags.." value={{ old('meta_tag') }}>
                    </div>
                    <div class="div formgroup">
                        <label for="meta_description">Meta Description </label>
                        <textarea type="text" name="meta_description" class="form-control" placeholder="Add Meta Description..">{{ old('meta_description') }}</textarea>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer ">
                <input type="submit" name="submit" class="btn btn-primary" value="Add"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
  </div>
</div>
<!-- The Modal AddUser --> 
<div class="modal" id="addUser">
  <div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <form id="add_user" action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" >Add User</h5>
                <button type="button" class="close" data-dismiss="modal" >&times;</span>
                </button>
            </div> 
            <!-- Modal body -->
            <div class="modal-body">
                <div class="div formgroup">
                    <label for="name"> Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="div formgroup">
                    <label for="email">Email name</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <div style="left:0px;  padding-top: 10px;" id="status"></div>
                </div>
                <div class="div formgroup">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" >
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="div formgroup">
                    <label for="notes">Notes </label>
                    <textarea  name="notes" class="form-control" placeholder="Details about the user" >{{ old('notes') }}</textarea>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer ">
                <input type="submit"  name="submit" class="btn btn-primary" value="Add"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
  </div>
</div>


<!-- The Modal AddPost -->
<div class="modal" id="addPost">
  <div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        {{-- <form action="create-post.php" method="POST"> --}}
            <form id="add_post" action="{{ route('posts.store') }}" method="POST">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" >Add post</h5>
                <button type="button" class="close" data-dismiss="modal" >&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="div formgroup">
                    <label for="post_title">Post Title</label>
                    <input type="text" name="post_title" class="form-control" placeholder="Post Title" value="{{ old('post_title') }}">
                    @if ($errors->has('post_title'))
                    <span class="text-danger">{{ $errors->first('post_title') }}</span>
                    @endif
                </div>
                <div class="div formgroup">
                    <label for="post_body">Post Body </label>
                    <textarea name="post_body" class="form-control" placeholder="Post Body">{{ old('post_body') }}</textarea>
                    @if ($errors->has('post_body'))
                    <span class="text-danger">{{ $errors->first('post_body') }}</span>
                    @endif
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="is_published" id="" class=""  @if(old('is_published')=="on") checked @endif>
                    <label>Published</label>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer ">
                <input type="submit" name="submit" class="btn btn-primary" value="Add"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
    CKEDITOR.replace( 'page_body' );
    CKEDITOR.replace( 'post_body' );
</script>
