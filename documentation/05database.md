# Database
- Database config file is 'config/database/database.php';
- To get database instance use the following syntax: <br>
<pre><code>$database = \Application\Database::init();</code></pre>

- If you import class with use you can write only
<pre><code>$database = Database::init();</code></pre>

- $database is hold object of type Database

<h2>Select Query</h2>
<h4>Raw query</h4>

- To sent raw query use the following syntax: <br>
<pre><code>$database->query('ALTER TABLE `users`')</code></pre>
And you can use for normal select query if you want to use your way processing result.
<pre><code>$database->query('SELECT * FROM `pages`')</code></pre>
- Don`t use query() method use when you need to use dynamic data. 

<h4>Select Method</h4>
- Use Select Method <br> Example <br>
<pre><code>$database = Database::init();<br>$pages = $database->select('SELECT * FROM `pages`');</code></pre>
- $pages value will be array of stdObject.

- If you need to use dynamic parameters use the following syntax: <br>
<pre><code>$pages = $database->select('SELECT * FROM `pages` WHERE `page_id` = ?', [$_GET['id']);</code></pre>

- The first argument passed to the select method is the raw SQL query with placeholder(?), while the second argument is any parameter bindings that need to be bound to the query. Parameter binding provides protection against SQL injection. 

- Example Real Controller<br>
<pre>
    <code>
use Application\Base
class User
{
    public function showProfilePage()
    {
     $database = \Application\Database::init();
     $user = $database->select('SELECT * FROM `users` WHERE `user_id` = ? and `is_active` = ?', ['2', '1']);
     return Base::View('user_profile', ['user' => $user]);       
    }        
}
    </code>
</pre>
- SQL in upper example will be "SELECT * FROM \`users\` WHERE \`user_id\` = 2 and \`is_active\` = 1"

<h2>Set Charset</h2>
- By Default framework will set charset utf8 you change charset with setCharset method of database object


<a href="06logger.md">Next</a>