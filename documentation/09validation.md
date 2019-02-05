# Validation 
- Validation work only with post data.
- When you controller extends BaseController (`Controller`) you will get access the method `validate`
from `$this`
- Example : <br>
<pre>
<code>$this->validate()</code>
</pre>
- Validate method is from Validate trait.
- Validate method expected two parameters:
 - First param is Object of type Request (this is data).
 - Second param is validation rules as associative array.