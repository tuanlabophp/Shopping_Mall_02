<div class="add-review row">
    @if (Auth::check())
    <div class="comment-item">
        <div class="row no-margin">
            <div class="col-xs-12 col-lg-12 col-sm-12 no-margin">
                <div class="comment-body">
                    <div class="meta-info">
                        <div class="author inline">
                            <a href="javascript:void(0)" class="bold">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</a>
                        </div>
                    </div><!-- /.meta-info -->
                    <div class="add-comment row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="new-comment-form">
                                {!! Form::open(['route' => 'product.comment.add', 'method' => 'post']) !!}
                                {!! Form::label(trans('sites.your_comment')) !!}
                                {!! Form::textarea('content', $value = '', ['id' => 'content', 'rows' => '2', 'class' => 'le-input']) !!}
                                {!! Form::hidden('product_id', $value = $product_id) !!}
                                {!! Form::button(trans('sites.submit'), ['id' => 'add-comment', 'class' => 'le-button', 'product_id' => $product_id, 'parent_id' => null, 'user_id' => Auth::user() ? Auth::user()->id : '' ]) !!}
                                {!! Form::close() !!}
                            </div><!-- /.new-comment-form -->
                        </div><!-- /.col -->
                    </div><!-- /.add-comment -->
                </div><!-- /.comment-body -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.comment-item -->
</div>
@endif
<div id="new_comment"></div>
<div class="comments">

    @foreach($comments as $comment)
    {{-- {{dd($comment)}} --}}
    @if(($comment->product_id == $product_id) && ($comment->parent_id == null))
    <div class="comment-item medium">
        <div class="row no-margin">
            <div class="col-xs-12 col-lg-12 col-sm-12 no-margin">
                <div class="comment-body">
                    <div class="meta-info">
                        <div class="author inline">
                            <a href="javascript:void(0)" class="bold">{{ $comment->getUser[0]->f_name }} {{ $comment->getUser[0]->l_name }}</a>
                        </div>
                        <div class="date inline pull-right">
                            {{ $comment->created_at }}
                        </div>
                    </div><!-- /.meta-info -->
                    <p class="comment-text">
                        {{ $comment->content }}
                    </p><!-- /.comment-text -->
                    @if (Auth::check())
                    <div class="buttons">
                        <a href="javascript:void(0)" class="le-button button-reply" data-comment-id="{{ $comment->id }}">
                            <i class="fa fa-reply"></i>
                        </a>
                        @if(Auth::user()->id == $comment->getUser[0]->id)
                        <a href="javascript:void(0)" class="le-button button-edit" data-comment-id="{{ $comment->id }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:void(0)" class="le-button button-delete" token="{{ csrf_token() }}" product_id="{{ $product_id }}" comment_id="{{ $comment->id }}">
                            <i class="fa fa-trash"></i>
                        </a>
                        @endif
                    </div>
                </div><!-- /.comment-body -->

                @if(Auth::user()->id == $comment->getUser[0]->id)
                <div class="edit hide">
                    {!! Form::open(['route' => 'product.comment.edit', 'method' => 'put']) !!}
                    {!! Form::label(trans('sites.edit_comment')) !!}
                    {!! Form::textarea('content_update', $value = $comment->content, ['id' => 'content_update', 'rows' => '2', 'class' => 'le-input']) !!}
                    {!! Form::hidden('parent_id', $value = $comment['id']) !!}
                    {!! Form::hidden('product_id', $value = $product_id) !!}
                    {!! Form::button(trans('sites.submit'), ['class' => 'le-button edit-comment', 'comment_id' => $comment['id'], 'product_id' => $product_id]) !!}
                    {!! Form::button(trans('sites.cancel'), ['id' => 'cancel_comment', 'class' => 'le-button small']) !!}
                    {!! Form::close() !!}
                </div>
                @endif

                <div class="reply hide">
                    {!! Form::open(['route' => 'product.comment.add', 'method' => 'post']) !!}
                    {!! Form::label(trans('sites.your_comment')) !!}
                    {!! Form::textarea('content', $value = '', ['id' => $comment['id'], 'rows' => '2', 'class' => 'le-input']) !!}
                    {!! Form::hidden('parent_id', $value = $comment['id']) !!}
                    {!! Form::hidden('product_id', $value = $product_id) !!}
                    {!! Form::button(trans('sites.submit'), ['id' => 'thang', 'class' => 'le-button submit_comment', 'product_id' => $product_id, 'parent_id' => $comment['id'], 'user_id' => Auth::user() ? Auth::user()->id : '' ]) !!}
                    {!! Form::button(trans('sites.cancel'), ['id' => 'cancel_comment', 'class' => 'le-button small']) !!}
                    {!! Form::close() !!}
                </div>
                @endif
                @foreach($comments as $reply)
                @if($reply->parent_id == $comment->id)
                <div class="reply-item small">
                    <div class="row no-margin">
                        <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                        </div><!-- /.col -->
                        <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                            <div class="comment-body">
                                <div class="meta-info">
                                    <div class="author inline">
                                        <a href="javascript:void(0)" class="bold">{{ @$reply->getUser[0]->f_name }} {{ @$reply->getUser[0]->l_name }}</a>
                                    </div>
                                    <div class="date inline pull-right">
                                        {{ $reply->created_at }}
                                    </div>
                                </div><!-- /.meta-info -->
                                <p class="comment-text">
                                    {{ $reply->content }}
                                </p><!-- /.comment-text -->
                                @if (Auth::check())
                                <div class="buttons">
                                    @if(Auth::user()->id == $reply->getUser[0]->id)
                                    <a href="javascript:void(0)" class="button-edit" data-comment-id="{{ $reply->id }}">
                                        <i class="fa fa-pencil"></i>
                                        <span>{{ trans('sites.edit') }}</span>
                                    </a>
                                    <a href="javascript:void(0)" class="button-delete" comment_id="{{ $reply->id }}" product_id="{{ $product_id }}" token="{{ csrf_token() }}">
                                        <i class="fa fa-trash"></i>
                                        <span>{{ trans('sites.delete') }}</span>
                                    </a>
                                    @endif
                                </div>
                                @endif
                            </div><!-- /.comment-body -->
                            @if (Auth::check())
                            @if(Auth::user()->id == $reply->getUser[0]->id)
                            <div class="edit hide">
                                {!! Form::open(['route' => 'product.comment.edit', 'method' => 'post']) !!}
                                {!! Form::label(trans('sites.edit_comment')) !!}
                                {!! Form::textarea('content_update', $value = $reply->content, ['id' => 'content_update', 'rows' => '2', 'class' => 'le-input']) !!}
                                {!! Form::hidden('parent_id', $value = $reply['id']) !!}
                                {!! Form::hidden('product_id', $value = $product_id) !!}
                                {!! Form::button(trans('sites.submit'), ['class' => 'le-button edit-comment', 'comment_id' => $reply['id'], 'product_id' => $product_id]) !!}
                                {!! Form::button(trans('sites.cancel'), ['id' => 'cancel_comment', 'class' => 'le-button small']) !!}
                                {!! Form::close() !!}
                            </div>
                            @endif
                            @endif
                            <!-- /.reply -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div>

                @endif
                @endforeach
                <!-- /.reply -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.comment-item -->
    @endif
    @endforeach
</div><!-- /.comments -->
