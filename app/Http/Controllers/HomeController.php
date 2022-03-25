<?php
namespace App\Http\Controllers;
use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $number_of_posts = Blog::count();
        $number_of_authors = User::count();
        $new_posts = Blog::orderBy('id', 'DESC')->take(5)->get();
        $new_authors = User::orderBy('id', 'DESC')->take(5)->get();
        $data = [
            'post_count' => $number_of_posts,
            'author_count' => $number_of_authors,
            'new_posts' => $new_posts,
            'new_authors' => $new_authors,
        ];

        return view('home', $data);
    }
    public function getRegisteredUsers()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('users', ['users' => $users]);
    }
    /**
     * A function to show a list of all blog posts
     */
    public function PostList()
    {
        $posts = Blog::with('writer')->get();
//        dd($posts);
        return view('post_list', ['posts' => $posts]);
    }
    /**
     * A function to show a form to create post
     */
    public function createPost()
    {
        return view('post_create');
    }

    /**
     * A function to store our post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePost(Request $request)
    {
        $request->validate([
                'title' => 'required',
                'body' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        $article = new Blog();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->author = Auth::id();
        $article->image = $input['imagename'];
        $article->save();

        return redirect()->route('all_posts')->with('status', 'New article has been successfully created!');
    }

    public function editPost($post_id)
    {
        $post = Blog::find($post_id);
        return view('edit_form', ['post' => $post]);
    }

    public function updatePost(Request $request, $post_id)
    {
        $post = Blog::find($post_id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
            $post->image = $input['imagename'];
        }
        $post->save();
        return redirect()->route('all_posts')->with('status', 'Post has been successfully updated!');
    }

    public function deletePost($post_id)
    {
        $post = Blog::find($post_id);
        $post->delete();
        return redirect()->route('all_posts')->with('status', 'Post has been successfully deleted!');
    }
}
