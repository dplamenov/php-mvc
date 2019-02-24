# Validation 
- Validation work only with post data.
- When you controller extends BaseController (`Controller`) you will get access the method `validate`
from `$this`
- Example : <br>
<pre>
<code>$this->validate()</code>
</pre>
- Validate working only with post data.
- Validate method is from Validate trait.
- Validate method expected two parameters:
- First param is Object of type Request (this is data).
- Second param is validation rules as associative array.

#Validation rules
1. min (1 param)
2. max (1 param)
3. string (no param)
4. required (no param)

Example use validation:
<pre>
<code> $validation = $this->validate($request, [
                  'name' => 'min:2|max:8|string',
                  'password' => 'min:5|string'
                ]);</code>
</pre>

- The keys of associative array are name of input.

- Return type is Object of Validation. You can use the following methods:
 - getStatus() - return true if validation is successful, false in all other cases.
 - errors() - return errors if count of error is more then zero.
 - getData() - get send data (from form) when data validate.
 