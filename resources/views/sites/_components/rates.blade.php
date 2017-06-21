<div class="reviews">

@if (Auth::check())
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
                                {!! Form::open(['route' => 'product.rate', 'method' => 'post']) !!}
                                {!! Form::label(trans('sites.your_point')) !!}
                                    <div class="star-holder inline">
                                        <div class="star" data-score="4"></div>
                                    </div>
                                    <br>
                                {!! Form::label(trans('sites.your_review')) !!}
                                {!! Form::textarea('content', $value = '', ['rows' => '2', 'class' => 'le-input']) !!}
                                {!! Form::hidden('point', $value = '') !!}
                                {!! Form::hidden('product_id', $value = $product->id) !!}
                                {!! Form::submit(trans('sites.submit'), ['id' => 'add_rate', 'class' => 'le-button']) !!}
                                {!! Form::close() !!}
                            </div><!-- /.new-comment-form -->
                        </div><!-- /.col -->
                    </div><!-- /.add-comment -->
                </div><!-- /.comment-body -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.comment-item -->
    @endif
</div>
<div id="new_review"></div>
<div class="reviews">
@if(!empty($rates))
    @foreach($rates as $rate)
        @if($rate->product_id == $product_id)
            <div class="comment-item medium">
                <div class="row no-margin">
                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                        <div class="avatar">
                            {{ Html::image(@$rate->getUser[0]->avatar, @$rate->getUser[0]->f_name, ['class' => 'img-responsive']) }}
                        </div><!-- /.avatar -->
                    </div><!-- /.col -->
                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                        <div class="comment-body">
                            <div class="meta-info">
                                <div class="author inline">
                                    <a href="javascript:void(0)" class="bold">{{ @$rate->getUser[0]->f_name }} {{ @$rate->getUser[0]->l_name }}</a>
                                </div>
                                <div class="star-holder inline">
                                    <div class="star" data-score="{{ $rate->point }}"></div>
                                </div>
                                <div class="date inline pull-right">
                                    {{ $rate->created_at }}
                                </div>
                            </div><!-- /.meta-info -->
                            <p class="comment-text">
                                {{ $rate->content }}
                            </p><!-- /.rate-text -->
                        </div><!-- /.rate-body -->
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.rate-item -->
        @endif
    @endforeach
@endif
</div><!-- /.rates -->
