<div class="panel panel-default">
    <div class="panel-body">
        <ul class="list-group">
            @foreach($post->comments->load('user') as $comment)
                <li class="list-group-item">

                    <div class="media">
                        <div class="media-left">
                            <a href="{{route('userHome', ['id' => $post->user->id, 'slug' => str_slug($post->user->display_name)])}}">
                                <img src="{{ asset($comment->user->avatar) }}" class="img-circle avatar-50">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="{{route('userHome', ['id' => $post->user->id, 'slug' => str_slug($post->user->display_name)])}}">
                                <h4 class="media-heading">{{ $comment->user->display_name }}</h4>
                            </a>
                            <span class="meta-title" style="color:#ccc"> {{ $comment->created_at->diffForHumans() }}</span>
                            <p>{{ $comment->comment_post}}</p>
                        </div>
                    </div>

                </li>
            @endforeach
        </ul>
    </div>

    @if(Auth::check())
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route'=>'postComment']) !!}
                <div class="form-group">
                    {!! Form::textarea('comment_post', null,['class' => 'form-control', 'placeholder' => 'Tulis komentar']) !!}
                    {!! Form::hidden('post_id', $post->id) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Tambah Komentar', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @endif

</div>