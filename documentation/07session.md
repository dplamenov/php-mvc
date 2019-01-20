# Session
- HTPP Session
- From Request object call method session() will return object of type Session, Session has 2 method: 
`get` and `put`
- To put data in session use the following syntax:
<pre><code> $request->session()->put('islogged', true);</code></pre>
- First param is name, second is value.

- To get data from session use the following syntax:
<pre><code> $request->session()->get('islogged');</code></pre>

- Default value
- When you get session by name as second param you can set default value <br> Example: <br>
<pre><code> $request->session()->get('islogged', false);</code></pre>
