# Views
- Views is stored in `views/`;
- Part of MVC. 
- File Extension of view must be `.php`. 
- To call view in controller use `return` statement.
- Call view in controller <br> Example <br>
<pre><code>return Base::View('welcome');</code></pre>

- Result of this code will be to show rendered view with name 'welcome'
- To pass data from controller to view use this syntax:<br>
<pre><code>return Base::View('welcome', ['name' => 'George']);</code></pre>

- Variable with name will be able to get from view with the following syntax <br>
<pre><code>{{$name}}</code></pre>

<a href="05database.md">Next</a>