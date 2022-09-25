@if (! $connections->isNotEmpty())
    @foreach($connections as $connection)
        <div class="my-4">
            <i class="fa fa-lg fa-fw text-gray-600"></i>
            <span class="text-lg font-bold">{{ $connection->service_username }}</span>
        </div>
    @endforeach
@else
    <div class="p-8 text-center">
        <div class="text-lg text-gray-400">No connections yet</div>
    </div>
@endif