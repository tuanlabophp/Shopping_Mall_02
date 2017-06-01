<div class="add-review row">
    <div class="comment-item">
        <div class="row no-margin">
            <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                <div class="avatar">
                    {{ Html::image(Auth::user()->avatar, Auth::user()->f_name, ['class' => 'img-responsive']) }}
                </div><!-- /.avatar -->
            </div><!-- /.col -->

            <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
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
                                    {!! Form::hidden('parent_id', $value = null) !!}
                                    {!! Form::hidden('product_id', $value = $product->id) !!}
                                    {!! Form::submit(trans('sites.submit'), ['id' => 'submit_comment', 'class' => 'le-button']) !!}
                                {!! Form::close() !!}
                            </div><!-- /.new-comment-form -->
                        </div><!-- /.col -->
                    </div><!-- /.add-comment -->
                </div><!-- /.comment-body -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.comment-item -->
</div>
<div id="new_comment"></div>
<div class="comments">

    @foreach($comments as $comment)
    {{-- {{dd($comment)}} --}}
        @if(($comment->product_id == $product_id) && ($comment->parent_id == null))
            <div class="comment-item medium">
                <div class="row no-margin">
                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                        <div class="avatar">
                            {{ Html::image($comment->getUser[0]->avatar, $comment->getUser[0]->f_name, ['class' => 'img-responsive']) }}
                        </div><!-- /.avatar -->
                    </div><!-- /.col -->
                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
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
                            <div class="buttons">
                                <a href="javascript:void(0)" class="le-button button-reply" data-comment-id="{{ $comment->id }}">
                                    <i class="fa fa-reply"></i>
                                </a>
                                @if(Auth::user()->id == $comment->getUser[0]->id)
                                    <a href="javascript:void(0)" class="le-button button-edit" data-comment-id="{{ $comment->id }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    {{-- {!! Form::open(['route' => ['product.comment.delete', $comment->id]]) !!}
                                        
                                        {!! Form::submit('x', ['class' => 'le-button']) !!}
                                    {!! Form::close() !!} --}}
                                @endif
                            </div>
                        </div><!-- /.comment-body -->

                        @if(Auth::user()->id == $comment->getUser[0]->id)
                            <div class="edit hide">
                                {!! Form::open(['route' => 'product.comment.edit', 'method' => 'put']) !!}
                                    {!! Form::label(trans('sites.edit_comment')) !!}
                                    {!! Form::textarea('content_update', $value = $comment->content, ['id' => 'content_update', 'rows' => '2', 'class' => 'le-input']) !!}
                                    {!! Form::hidden('parent_id', $value = $comment['id']) !!}
                                    {!! Form::hidden('product_id', $value = $product->id) !!}
                                    {!! Form::button(trans('sites.submit'), ['id' => 'submit_comment', 'class' => 'le-button']) !!}
                                    {!! Form::button(trans('sites.cancel'), ['id' => 'cancel_comment', 'class' => 'le-button small']) !!}
                                {!! Form::close() !!}
                            </div>
                        @endif

                        <div class="reply hide">
                            {!! Form::open(['route' => 'product.comment.add', 'method' => 'post']) !!}
                                {!! Form::label(trans('sites.your_comment')) !!}
                                {!! Form::textarea('content', $value = '', ['id' => $comment['id'], 'rows' => '2', 'class' => 'le-input']) !!}
                                {!! Form::hidden('parent_id', $value = $comment['id']) !!}
                                {!! Form::hidden('product_id', $value = $product->id) !!}
                                {!! Form::button(trans('sites.submit'), ['id' => 'submid_comment', 'class' => 'le-button']) !!}
                                {!! Form::button(trans('sites.cancel'), ['id' => 'cancel_comment', 'class' => 'le-button small']) !!}
                            {!! Form::close() !!}
                        </div>

                        @foreach($comments as $reply)
                            @if($reply->parent_id == $comment->id)
                                <div class="reply-item small">
                                    <div class="row no-margin">
                                        <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                            <div class="avatar">
                                                {{ Html::image(@$reply->getUser[0]->avatar, @$reply->getUser[0]->f_name, ['class' => 'img-responsive']) }}
                                            </div><!-- /.avatar -->
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
                                                <div class="buttons">
                                                    @if(Auth::user()->id == $comment->getUser[0]->id)
                                                        <a href="javascript:void(0)" class="button-edit" data-comment-id="{{ $reply->id }}">
                                                            <i class="fa fa-pencil"></i>
                                                            <span>{{ trans('sites.edit') }}</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="button-delete" data-comment-id="{{ $reply->id }}">
                                                            <i class="fa fa-trash"></i>
                                                            <span>{{ trans('sites.delete') }}</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div><!-- /.comment-body -->

                                            @can('update', $reply)
                                                <div class="edit hide">
                                                    <textarea name="content" class="form-control" rows="2"></textarea>
                                                    <div class="actions">
                                                        <div class="text-right">
                                                            <button type="button" class="btn btn-default btn-xs btn-cancel">
                                                                {{ trans('view.cancel') }}
                                                            </button>
                                                            <button type="submit" class="btn btn-info btn-xs btn-edit" data-comment-id="{{ $reply->id }}">
                                                                {{ trans('view.save')}}
                                                            </button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan

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