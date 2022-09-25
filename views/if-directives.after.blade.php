@unless($condition)
    {{-- $condition is false --}}
@endunless

@isset($records)
    {{-- $records is set --}}
@endisset

@empty($records)
    {{-- $records is "empty" --}}
@endempty

@auth
    {{-- user is authenticated --}}
@endauth

@guest
    {{-- user is not authenticated --}}
@endguest

@can('foo')
    {{-- user can "foo" --}}
@endcan

@cannot('foo')
    {{-- user can not "foo" --}}
@endcannot

@production
    {{-- in "production" environment --}}
@endproduction

@env('local', 'testing')
    {{-- in "local" or "testing" environment --}}
@endenv
