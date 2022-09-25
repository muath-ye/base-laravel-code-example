@foreach ($orders as $order)
    <tr class="border-t border-gray-200">
        <td class="py-4 pl-6 pr-2 whitespace-no-wrap">
            <div class="text-gray-800 font-semibold">{{ $order->product->name }}</div>
            <div class="mt-1 text-gray-600">#{{ $order->id }}</div>
        </td>
        <td class="py-4 px-2 whitespace-no-wrap">
            <div class="text-gray-800 font-semibold">
                <a href="{{ service_url($order->connection->service, $order->repository) }}" title="View repository on {{ $order->connection->service }}" class="group hover:underline focus:underline focus:outline-none" rel="external" target="_blank">
                    {{ $order->repository }}<span class="opacity-0 group-hover:opacity-100 ml-1 text-sm"><i class="fa fa-external-link text-gray-500"></i></span>
                </a>
            </div>
            <div class="mt-1 text-gray-600">{{ $order->source_branch }}</div>
        </td>
        @if ($order->status === \App\Models\Order::STATUS_DELAYED)
            <td class="py-4 px-2">-</td>
        @else
            <td class="py-4 px-2 whitespace-no-wrap" title="{{ $order->run_at->format('l, F j, Y') }}">{{ $order->run_at->diffForHumans() }}</td>
        @endif
        <td class="py-4 px-2 text-center">
            @if($order->status === \App\Models\Order::STATUS_HOLD)
                @if($order->ranTwice())
                    <!-- failed button -->
                @else
                    <!-- rerun button -->
            @elseif($order->status === \App\Models\Order::STATUS_PENDING)
                <!-- run button -->
            @else
                <a
                   @unless ($order->status === \App\Models\Order::STATUS_FULFILLED)
                   x-cloak
                   @endunless
                   x-show="orders[{{ $order->id }}].status === 'completed'"
                   :href="orders[{{ $order->id }}].pr_url"
                   class="text-shift-red font-bold text-sm whitespace-no-wrap hover:underline focus:underline focus:outline-none"
                   title="View {{ Str::lower(pr_name($order->connection->service)) }}"
                   rel="external"
                   target="_blank">
                  <i class="fa fa-code-fork fa-fw"></i>#<span x-text="orders[{{ $order->id }}].pr_number"></span>
                </a>
            @endif
        </td>
    </tr>
@endforeach
