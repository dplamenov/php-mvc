# Logger

- Framework use Monolog as library for logging.
- Log file is in home directory in and file name is log.log. You can change them from `config/logger.php` file.
- Example <br>
in your controller write:
<pre><code>$log = new \Application\Logger();</code></pre>

List of methods
<ol>
<li>error($msg)</li>
<li>warning($msg)</li>
</ol>
- You can use them so:

<pre><code>$log->error('Some error');</code></pre>