# Database
- Database config file is 'config/database/database.php';
- To get database instance use the following syntax: <br>
<pre><code>$database = \Application\Database::init();</code></pre>

- If you import class with use you can write only
<pre><code>$database = Database::init();</code></pre>

- $database is hold object of type Database