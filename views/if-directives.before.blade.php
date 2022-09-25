@if(!$condition)
    {{-- $condition is false --}}
@endif

@if(isset($records))
    {{-- $records is set --}}
@endif

@if(empty($records))
    {{-- $records is "empty" --}}
@endif

@if(Auth::check())
    {{-- user is authenticated --}}
@endif

@if(!Auth::check())
    {{-- user is not authenticated --}}
@endif

@if(Gate::allows('foo'))
    {{-- user can "foo" --}}
@endif

@if(Gate::denies('foo'))
    {{-- user can not "foo" --}}
@endif

@if(App::environment('production'))
    {{-- in "production" environment --}}
@endif

@if(App::environment('local', 'testing'))
    {{-- in "local" or "testing" environment --}}
@endif
