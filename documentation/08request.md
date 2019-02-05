# Request
- Use request class for get value from http get and post
<br>
- Auto instance:
 If you in your method write param, this param will be of type Request.
 Example:<br>
 <pre>
    <code>
    public function showForm(\Application\Request $request)
    {
        var_dump($request);
    }
    </code>
 </pre>
 <a href="09validation.md">Next</a>