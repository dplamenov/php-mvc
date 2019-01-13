# Controllers
- Controllers is php class.
- Controllers is stored in `controllers/`;
- Their file name must be a same with class name.
- Part of MVC.
- After created controller you can created method.
- To output anythings use only return.
- Render view in method<br>
Example<br>
<pre>
 <code>
    return Base::View('welcome', []);
 </code>
</pre>
You can view more about view <a href="04view.md">here</a>

- Example Controller : <br>
<pre>
    <code>
    use Application\Base;
    
    class Welcome
    {
        public function showForm()
        {
            return Base::View('welcome', []);
        }
    
        public function storeData()
        {
            return 'Post';
        }
            
    }
    </code>
</pre>

<a href="04view.md">Next</a>