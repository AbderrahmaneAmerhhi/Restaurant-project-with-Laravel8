<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Comment;
use phpDocumentor\Reflection\Types\Null_;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('authAdmin')->except('store');
    }
    public function index(Request $request)
    {
        //
        if (!empty($request->search)) {
            return view('admin.comments.index')->with([
                'comments' => Comment::where('id', 'like', "%{$request->search}%")
                    ->orWhere('comment', 'like', "%{$request->search}%")->paginate(5),
                'reviews' => Comment::where('status', 1)->count(),
                'reviewsArchive' => Comment::whereNotNull('deleted_at')->withTrashed()->count(),
                'Allreviews' =>  Comment::withTrashed()->count(),
                'Earning' => Order::sum('total'),
            ]);
        } else {
            return view('admin.comments.index')->with([
                'comments' => Comment::latest()->paginate(5),
                'reviews' => Comment::where('status', 1)->count(),
                'reviewsArchive' => Comment::whereNotNull('deleted_at')->withTrashed()->count(),
                'Allreviews' =>  Comment::withTrashed()->count(),
                'Earning' => Order::sum('total'),
            ]);
        }
    }
    public function getArhcive()
    {
        # code...
        return view('admin.comments.index')->with([
            'comments' => Comment::whereNotNull('deleted_at')->withTrashed()->paginate(5),
            'reviews' => Comment::where('status', 1)->count(),
            'reviewsArchive' => Comment::whereNotNull('deleted_at')->withTrashed()->count(),
            'Allreviews' =>  Comment::withTrashed()->count(),
            'Earning' => Order::sum('total'),

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {

        $comment = filter_var($request->comment, FILTER_SANITIZE_STRING);
        $userId = auth()->user()->id;
        if (!empty($comment)) {
            Comment::create([
                "comment" => $comment,
                "status" => 0,
                "user_id" => $userId,
            ]);
            return redirect()->route("resto.index")->with([
                "success" => "Your review is awaiting validation "
            ]);
        } else {
            return redirect()->route("resto.index")->with([
                "error" => "Sorry, it is not possible to enter an empty value in Reviwe !! "
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, $id)
    {
        //
        $comment = Comment::findOrFail($id);

        $comment->update([
            'status' => 1,
        ]);
        return redirect()->route('reviews.index')->with(['success' => 'Review Validated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    // Unarchive function
    public function Unarchive($id)
    {
        $comment = Comment::where('id', $id)->withTrashed()->first();
        $comment->update([
            'deleted_at' => null,
        ]);

        return redirect()->route('reviews.index')->with(['success' => 'Review Unarchived']);
    }
    public function destroy($id)
    {
        //
        $comment = Comment::findOrFail($id);
        $comment->status = 0;
        $comment->save();
        $comment->delete();
        return redirect()->route('reviews.index')->with(['success' => 'Review Archived']);
    }
}
