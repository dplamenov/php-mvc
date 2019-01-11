# Routes
- Routes is in 'config/web/routes.php' <br>
- Framework make difference between http method get and post
- Don`t delete <code>use Application\Route;</code> in 'config/web/routes.php' file

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

<h2>First Route</h2>
 - To make get route write <code>Route::get('/',"Welcome@index")</code> <br>
 - To make post route write <code>Route::post('/',"Welcome@index")</code> <br>
 - First param will be url, first part of second param will be controller and second part will be method <br>
 