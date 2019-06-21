<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Redirect;
use Validator;

use Elasticsearch\ClientBuilder;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public  $elasticsearch_search;

    // public function __construct(ClientBuilder $elasticsearch)
    // {
    //      $this->elasticsearch_search = ClientBuilder::create()->build();
    // }
    public function getArticles()
    {
        

    return view('welcome');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function es()
    {
        return view('es');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function es_save(Request $r)
    {
            $elasticsearch  = ClientBuilder::create()->setHosts(['localhost:9200'])->build();

         
        $title = $r->input('title');
        $body = $r->input('body');
        $tags = $r->input('tags');
      

        $data = ['title' => $title, 'body'=>$body, 'tags' =>$tags];
        $rules = ['title' => 'required', 'body' =>'required', 'tags'=>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {

// $es = new Client([

// 'host' => ['localhost:9200']

// ]);
      
$indexed = $elasticsearch->index([
    'index' => 'articles',
    'type' =>'article',
    'body' =>[
'title' => $title,
'body' => $body,
'tags' =>  $tags
    ]
]);

//return $indexed;


          
            $artice = new Article();
            $artice->title = $title;
            $artice->body = $body;
            $artice->tags = $tags;
          
            $artice->save();
            return Redirect::back()->with('success', 'New Article successfuly created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_es()
    {

        $elasticsearch_search = ClientBuilder::create()->build();
         //$client =new ClientBuilder();
        $query = "data systems";

         $items = $elasticsearch_search->search([
            'index' => 'articles',
            'type' => 'article',
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['title', 'body'],
                        'query' => $query,

                    ],

                ],
   

            ],
           
            'size' =>2000,
            

        ]);
       return $items;




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_my()

    {
     $query = "data systems";


        $articles = Article::orderBy('id','DESC')->where('title','LIKE', "%{$query}%")->orWhere('body','LIKE',"%{$query}%")->limit(2000)->get();
        return $articles;

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
    }
}
