<div>
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Send Us a Message</h2>

    {{-- Success Alert Box --}}
    @if (session()->has('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border-l-4 border-emerald-500 text-emerald-900 shadow-md flex items-start gap-3">
            <svg class="w-6 h-6 text-emerald-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <div>
                <h4 class="font-bold text-emerald-900">Success!</h4>
                <p class="text-sm font-medium mt-0.5 text-emerald-800">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- Danger Error Box --}}
    @if (session()->has('error'))
        <div class="mb-6 p-4 rounded-xl bg-red-50 border-l-4 border-red-600 text-red-900 shadow-md flex items-start gap-3">
            <svg class="w-6 h-6 text-red-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <div>
                <h4 class="font-bold text-red-900">Error Occurred</h4>
                <p class="text-sm font-semibold mt-0.5 text-red-700">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <form wire:submit="sendMessage" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                <input type="text" wire:model.live="name" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition" placeholder="John Doe">
                @error('name') <span class="text-red-600 text-sm font-semibold mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" wire:model.live="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition" placeholder="john@example.com">
                @error('email') <span class="text-red-600 text-sm font-semibold mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
            <select wire:model="subject" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent">
                <option value="">Choose a topic...</option>
                <option>Online Course Inquiry</option>
                <option>Offline Center Registration</option>
                <option>Partnership Opportunities</option>
                <option>Technical Support</option>
                <option>Refund & Billing</option>
                <option>Other</option>
            </select>
            @error('subject') <span class="text-red-600 text-sm font-semibold mt-1 block">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Message (Markdown supported)</label>
            <textarea wire:model.live="message" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition resize-none" placeholder="How can we help you today? Use Markdown for formatting if desired."></textarea>
            @error('message') <span class="text-red-600 text-sm font-semibold mt-1 block">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <button type="submit" wire:loading.attr="disabled"
                    class="px-10 py-4 bg-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F] text-white font-bold rounded-xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300 disabled:opacity-70">
                <span wire:loading.remove wire:target="sendMessage">Send Message</span>
                <span wire:loading wire:target="sendMessage">Sending...</span>
            </button>
        </div>
    </form>
</div>