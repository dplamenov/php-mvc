# ORM
- To use ORMs method create model (php class is `models` dir, who extends Model class)
- Use must rewrite two property: tableName and primaryKey. These properties are with protected access. See the following example:
<pre>
    <code>
class User extends Model
{
    protected $tableName = 'users';
    protected $primaryKey = 'user_id';        
}
    </code>
</pre>
- You model will have the following methods:
- find($primaryKey) - return the item with this `primary key` (will return only one element)
- where($column, $operator, $value) Example use <br>
<pre>
    <code>
  $user = new \Models\User();
  $users = $user->where('user_id', '<', 2); //return all users where user_id < 2
    </code>
</pre>
