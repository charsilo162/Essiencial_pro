<div class="space-y-8">

    <div>
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Agent commissions</h2>
        <p class="text-sm text-gray-500 mt-1">
            Each person an agent registers earns the agent a fixed amount. Pay agents manually, then mark the commissions as paid.
        </p>
    </div>

    @if ($flash)
        <div class="rounded-xl border p-3 text-sm {{ $flash['ok'] ? 'border-green-300 bg-green-50 text-green-800' : 'border-red-300 bg-red-50 text-red-700' }}">
            {{ $flash['text'] }}
        </div>
    @endif

    {{-- AMOUNT PER PERSON --}}
    <form wire:submit.prevent="saveRate" class="max-w-md space-y-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Amount per registered person (₦)</label>
        <div class="flex gap-3">
            <input type="number" step="0.01" min="0" wire:model="rate"
                class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
            <button type="submit" wire:loading.attr="disabled" wire:target="saveRate"
                class="bg-sky-500 hover:bg-sky-600 text-white font-semibold px-5 rounded-lg transition disabled:opacity-60">
                <span wire:loading.remove wire:target="saveRate">Save</span>
                <span wire:loading wire:target="saveRate">Saving...</span>
            </button>
        </div>
        @error('rate') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        <p class="text-xs text-gray-500">A new amount applies to future registrations only. Past commissions keep the amount they were earned at.</p>
    </form>

    {{-- TOTALS --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-orange-200 bg-orange-50 px-5 py-4">
            <p class="text-xs font-semibold text-gray-500 uppercase">Pending (owed)</p>
            <p class="text-2xl font-bold text-orange-600">₦{{ number_format($totals['pending'] ?? 0, 2) }}</p>
            <p class="text-xs text-gray-500">{{ $totals['pending_count'] ?? 0 }} commission(s)</p>
        </div>
        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4">
            <p class="text-xs font-semibold text-gray-500 uppercase">Paid</p>
            <p class="text-2xl font-bold text-green-600">₦{{ number_format($totals['paid'] ?? 0, 2) }}</p>
            <p class="text-xs text-gray-500">{{ $totals['paid_count'] ?? 0 }} commission(s)</p>
        </div>
        <div class="rounded-xl border border-sky-200 bg-sky-50 px-5 py-4">
            <p class="text-xs font-semibold text-gray-500 uppercase">Total earned</p>
            <p class="text-2xl font-bold text-sky-600">₦{{ number_format($totals['total'] ?? 0, 2) }}</p>
        </div>
    </div>

    {{-- STATUS FILTER --}}
    <div class="flex flex-wrap gap-2">
        @foreach (['' => 'All', 'pending' => 'Pending', 'paid' => 'Paid'] as $value => $label)
            <button type="button" wire:click="setStatus('{{ $value }}')"
                class="px-4 py-2 text-sm font-semibold rounded-lg border transition {{ $status === $value ? 'bg-sky-500 text-white border-sky-500' : 'bg-white text-gray-600 border-gray-300 hover:bg-gray-50' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    {{-- AGENT FILTER BAR --}}
    @if ($agentId)
        <div class="flex flex-wrap items-center justify-between gap-3 rounded-xl border border-sky-200 bg-sky-50 p-4">
            <p class="text-sm text-sky-900">Showing only <b>{{ $agentName }}</b></p>
            <div class="flex items-center gap-4">
                @if (($totals['pending_count'] ?? 0) > 0)
                    <button type="button" wire:click="payAll"
                        wire:confirm="Mark ALL pending commissions for {{ $agentName }} as paid? Only do this after you have sent the money."
                        wire:loading.attr="disabled" wire:target="payAll"
                        class="bg-green-600 hover:bg-green-700 text-white text-xs font-bold px-4 py-2 rounded-lg disabled:opacity-60">
                        Pay all pending (₦{{ number_format($totals['pending'], 2) }})
                    </button>
                @endif
                <button type="button" wire:click="clearAgent" class="text-xs underline text-sky-700">Show all agents</button>
            </div>
        </div>
    @endif

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">Agent</th>
                    <th class="px-4 py-2">Person registered</th>
                    <th class="px-4 py-2 text-right">Amount</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2 text-center">Status</th>
                    <th class="px-4 py-2 text-right"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $c)
                    @php $paid = $c['status'] === 'paid'; @endphp
                    <tr class="border-t border-gray-200" wire:key="commission-{{ $c['id'] }}">
                        <td class="px-4 py-2">
                            <button type="button"
                                wire:click="filterAgent({{ $c['agent_id'] }}, @js($c['agent_name']))"
                                class="font-medium text-sky-600 hover:underline text-left">
                                {{ $c['agent_name'] }}
                            </button>
                            <div class="text-xs text-gray-500">{{ $c['agent_email'] }}</div>
                        </td>
                        <td class="px-4 py-2">{{ $c['person_name'] }}</td>
                        <td class="px-4 py-2 text-right font-medium">₦{{ number_format($c['amount'], 2) }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($c['created_at'])->format('d M Y') }}</td>
                        <td class="px-4 py-2 text-center">
                            <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full {{ $paid ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ $paid ? 'Paid ' . \Carbon\Carbon::parse($c['paid_at'])->format('d M Y') : 'Pending' }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-right">
                            @unless ($paid)
                                <button type="button" wire:click="markPaid({{ $c['id'] }})"
                                    wire:confirm="Mark ₦{{ number_format($c['amount'], 2) }} for {{ $c['agent_name'] }} as paid?"
                                    wire:loading.attr="disabled" wire:target="markPaid({{ $c['id'] }})"
                                    class="bg-green-600 hover:bg-green-700 text-white text-xs font-bold px-3 py-1.5 rounded-lg disabled:opacity-60">
                                    Mark as paid
                                </button>
                            @endunless
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">No commissions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    @if ($lastPage > 1)
        <div class="flex items-center justify-between max-w-sm">
            <button wire:click="previousPage" type="button" @disabled($pageNumber <= 1)
                class="px-4 py-2 rounded-lg border border-gray-300 text-sm disabled:opacity-40">Previous</button>
            <span class="text-sm text-gray-600">Page {{ $pageNumber }} of {{ $lastPage }}</span>
            <button wire:click="nextPage" type="button" @disabled($pageNumber >= $lastPage)
                class="px-4 py-2 rounded-lg border border-gray-300 text-sm disabled:opacity-40">Next</button>
        </div>
    @endif
</div>