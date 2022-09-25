@foreach ($orders as $order)
    <tr class="border-t border-gray-200">
        <td class="py-4 pl-6 pr-2 whitespace-no-wrap">
            <div class="text-gray-800 font-semibold">{{ ShiftPresenter::displayName($order) }}</div>
            <div class="mt-1 text-gray-600">#{{ $order->id }}</div>
        </td>
        <td class="py-4 px-2 whitespace-no-wrap">
            <div class="text-gray-800 font-semibold">
                <a href="{{ ShiftPresenter::repositoryLink($order) }}" title="{{ ShiftPresenter::repositoryLinkCta($order) }}" class="group hover:underline focus:underline focus:outline-none" rel="external" target="_blank">
                    {{ $order->repository }}<span class="opacity-0 group-hover:opacity-100 ml-1 text-sm"><i class="fa fa-external-link text-gray-500"></i></span>
                </a>
            </div>
            <div class="mt-1 text-gray-600">{{ $order->source_branch }}</div>
        </td>
        @if ($order->hasRun())
            <td class="py-4 px-2">-</td>
        @else
            <td class="py-4 px-2 whitespace-no-wrap" title="{{ ShiftPresenter::runAtCta($order) }}">{{ {{ ShiftPresenter::runAtDisplay($order) }} }}</td>
        @endif
        <td class="py-4 px-2 text-center">
            @if($order->onHold())
                @if($order->ranTwice())
                    <!-- failed button -->
                @else
                    <!-- rerun button -->
            @elseif($order->isPending())
                <!-- run button -->
            @else
                <a
                     @unless ($order->hasRun())
                     x-cloak
                     @endunless
                     x-show="orders[{{ $order->id }}].status === 'completed'"
                     :href="orders[{{ $order->id }}].pr_url"
                     class="text-shift-red font-bold text-sm whitespace-no-wrap hover:underline focus:underline focus:outline-none"
                     title="{{ ShiftPresenter::prLinkCta($order) }}"
                     rel="external"
                     target="_blank">
                    <i class="fa fa-code-fork fa-fw"></i>#<span x-text="orders[{{ $order->id }}].pr_number"></span>
                </a>
            @endif
        </td>
    </tr>
@endforeach
