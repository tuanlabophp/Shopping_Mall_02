<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sites\CommentRequest;
use App\Models\Comment;
use App\Models\Product;

class CommentsController extends Controller
{
    public function __construct(Comment $comment, Product $product)
    {
        $this->comment = $comment;
        $this->product = $product;
    }
    /**
     * Store a new comment resource.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentRequest $request)
    {
        // dd($request->all());
        try {
            $attributes['content'] = $request->input('content');
            $attributes['user_id'] = $request->user()->id;
            $attributes['parent_id'] = $request->input('parent_id');
            $attributes['product_id'] = $request->input('product_id');

            $comment = new Comment($attributes);
            $comment->save();
            $comments = Comment::where('product_id', $attributes['product_id'])->orderBy('created_at', 'desc')->get();
            return view('sites._components.comments')->with(['product_id' => $attributes['product_id'], 'comments' => $comments]);

            session()->flash('success', trans('sites.create_comment_success'));
        } catch (\Exception $e) {
            session()->flash('fail', trans('sites.create_comment_fail'));
            dd($e->getMessage());
        }
    
        return redirect('product/' . $request->input('product_id'));
    }

    /**
     * Update an exist comment resource.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CommentRequest $request)
    {
        $attributes['content'] = $request->content;

        try {
            $comment = $this->comment->where('id', $request->comment_id)->update($attributes);
            $comments = Comment::where('product_id', $request->product_id)->orderBy('created_at', 'desc')->get();
            return view('sites._components.comments')->with(['product_id' => $request->product_id, 'comments' => $comments]);
            session()->flash('success', trans('sites.update_comment_success'));
        } catch (\Exception $e) {
            session()->flash('fail', trans('sites.update_comment_fail'));
        }
    }

    /**
     * Delete an exist comment resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        try {
            $this->comment->where('id', $request->comment_id)->delete();
            $comments = Comment::where('product_id', $request->product_id)->orderBy('created_at', 'desc')->get();

            return view('sites._components.comments')
                        ->with(['product_id' => $request->product_id,
                                'comments' => $comments]);
        } catch (\Exception $e) {
            session()->flash('success', trans('sites.delete_comment_success'));
        }
    }
}
