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