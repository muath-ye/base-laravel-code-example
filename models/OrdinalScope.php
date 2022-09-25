namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrdinalScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('ordinal', 'asc');
    }
}