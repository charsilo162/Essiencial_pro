<div>
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Send Us a Message</h2>
    <form wire:submit="sendMessage" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                <input type="text" wire:model.live="name" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition" placeholder="John Doe">
                @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" wire:model.live="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition" placeholder="john@example.com">
                @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
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
            @error('subject') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Message (Markdown supported)</label>
            <textarea wire:model.live="message" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition resize-none" placeholder="How can we help you today? Use Markdown for formatting if desired."></textarea>
            @error('message') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <button type="submit" wire:loading.attr="disabled"
                    class="px-10 py-4 bg-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F] text-white font-bold rounded-xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300 disabled:opacity-70">
                <span wire:loading.remove wire:target="sendMessage">Send Message</span>
                <span wire:loading wire:target="sendMessage">Sending...</span>
            </button>
            @if(session()->has('success'))
                <div class="text-green-600 font-semibold animate-pulse">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </form>
</div>