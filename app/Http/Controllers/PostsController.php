<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();

        // query scope show latest first
        $posts = Post::latest();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // here we opening create form page
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $input = $request->all();

        if($file = $request->file('file')) {

            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $input['path'] = $name;

        }

        Post::create($input);



//        // below is retrieve FILE data
//        // the $request->file has an array
//        // in same way as $_FILES['file']
//        $file = $request->file('file');
//
//        // get temp file name
//        echo $file->getBasename();
//        echo "<br>";
//
//        // get original real name
//        echo $file->getClientOriginalName();
//        echo "<br>";
//
//        // get file size
//        echo $file->getClientSize();
//        echo "<br>";
//
//        // get temporary space where the file will be stored
//        echo $file->getFileInfo();



//        $this->validate($request, [
//
//            'title' => 'required|max:10'
//
//        ]);

        //// here we receive the data from submitted form as an array
        //return $request->all();

        //// use method get() to get the property
        //return $request->get('title');

        //// use -> to get the property
        //return $request->title;

        // save all the request to the database
        //Post::create($request->all());


//        $input = $request->all();
//        $input['title'] = $request->title;
//        Post::create($input);


//        $post = new Post;
//        $post->title = $request->title;
//        $post->save();

        // finally we redirect to /posts/index page
        //return redirect('/posts');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [

            'title' => 'required|max:10'

        ]);

        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        //$post = Post::findOrFail($id);
        //$post->delete();

        $post = Post::whereId($id)->delete();

        return redirect('/posts');
    }



    // this function/method will look in resources/views/contact.blade.php and will return it
    public function contact($id, $name){

        //return view('contact')->with('id', $id);
        $people = ['Darina', 'Svetoslav', 'Sasha', 'Stoyan', 'Jordan'];

        return view('contact', compact('id', 'name', 'people'));

    }

}
