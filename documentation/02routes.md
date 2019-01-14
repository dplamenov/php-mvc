# Routes
- Routes is in 'config/web/routes.php' <br>
- Framework make difference between http method get and post
- Don\`t delete <code>use Application\Route;</code> in `config/web/routes.php` file

<h2>Simple Route</h2>
 - Before create <a href="03controller.md">Controller</a> if you need to use route you can use 
 closure as controller & method <br>Example: <br><br>
<pre>
 <code>
    Route::get("/",function (){
        return \Application\Base::View('welcome');
    });   
 </code>
</pre>

- This is route by http get method. First param is url. Second param is closure.
This closure return view with name 'welcome'.
- For routes with closure isn`t recommend to use serious programming logic (Database Connection, Call Models, etc.).
- Use closure routes for static page (about us).

<h2>First Route</h2>
 - To make get route write <code>Route::get('/',"Welcome@index")</code> <br>
 - To make post route write <code>Route::post('/',"Welcome@index")</code> <br>
 - First param will be url, first part of second param will be controller and second part will be method <br>
 
<h2>Dynamic Route</h2>

- Example: <pre><code>Route::get("/{id}", 'Welcome@showForm');</code></pre>

- To key this value in example use `id ` key.

- To get this value use \Application\Request class get method.
<br>
 <a href="03controller.md">Next</a>