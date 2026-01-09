<div>
    <h2 class="text-3xl font-bold mb-10">Send a Message</h2>

    <form wire:submit="sendMessage" class="space-y-6 text-gray-200">

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="text-sm text-gray-400">Full Name</label>
                <input wire:model.live="name" type="text"
                       class="mt-2 w-full px-4 py-3 rounded-xl bg-black border border-white/20
                              focus:ring-2 focus:ring-white focus:border-transparent">
                @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-sm text-gray-400">Email</label>
                <input wire:model.live="email" type="email"
                       class="mt-2 w-full px-4 py-3 rounded-xl bg-black border border-white/20
                              focus:ring-2 focus:ring-white focus:border-transparent">
                @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="text-sm text-gray-400">Subject</label>
            <select wire:model="subject"
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-black border border-white/20
                           focus:ring-2 focus:ring-white focus:border-transparent">
                <option value="">Select a topic</option>
                <option>Online Course Inquiry</option>
                <option>Offline Center Registration</option>
                <option>Partnership Opportunities</option>
                <option>Technical Support</option>
                <option>Billing</option>
                <option>Other</option>
            </select>
            @error('subject') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="text-sm text-gray-400">Message (Markdown supported)</label>
            <textarea wire:model.live="message" rows="5"
                      class="mt-2 w-full px-4 py-3 rounded-xl bg-black border border-white/20
                             focus:ring-2 focus:ring-white focus:border-transparent resize-none"
                      placeholder="How can we help you today? Use Markdown for formatting if desired."></textarea>
            @error('message') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center gap-6">
            <button type="submit" wire:loading.attr="disabled"
                    class="px-10 py-4 bg-white text-black font-bold rounded-full
                           hover:bg-gray-200 transition disabled:opacity-70">
                <span wire:loading.remove wire:target="sendMessage">Send Message</span>
                <span wire:loading wire:target="sendMessage">Sending…</span>
            </button>

            @if(session()->has('success'))
                <span class="text-green-400 font-semibold">
                    {{ session('success') }}
                </span>
            @endif
        </div>
    </form>
</div>