<nav>
    @if($user && $current_account_id != $list->account_id)
        <a href="{{ route('list-add.create', $list) }}">Add this list to you account</a>
    @elseif($user)
        List
    @else
        <a href="{{ route('login', ['l' => $list->id]) }}">Log in</a>
    @endif
</nav>

<section>
    @foreach($list->items as $item)
        @if($display === 'minimal')
            <div>
                <!-- ... -->
            </div>
        @elseif($display === 'condensed')
            <table>
                <!-- ... -->
            </table>
        @else
            <table>
                <!-- ... -->
            </table>
        @end
    @endforeach
</section>
