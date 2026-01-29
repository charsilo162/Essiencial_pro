<div>
    <h2 class="text-3xl font-bold mb-10">Send a Message</h2>

    <form wire:submit="sendMessage" class="space-y-6 text-gray-200">

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="text-sm font-medium text-gray-700">Full Name</label>
                <input wire:model.live="name" type="text"
                        class="mt-2 w-full px-4 py-3 rounded-xl bg-white border border-gray-300
                        text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-gray-900/10 focus:border-gray-900 transition">
                @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">Email</label>
                <input wire:model.live="email" type="email"
                    class="mt-2 w-full px-4 py-3 rounded-xl
                            bg-white border border-gray-300
                            text-gray-900 placeholder-gray-400
                            focus:ring-2 focus:ring-gray-900/10
                            focus:border-gray-900 transition">

                @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Subject</label>
            <select wire:model="subject"
            class="mt-2 w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-900
               focus:ring-2 focus:ring-gray-900/10 focus:border-gray-900 transition">

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
            <label class="text-sm font-medium text-gray-700">Message (Markdown supported)</label>
           <textarea wire:model.live="message" rows="5"
          class="mt-2 w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-900 placeholder-gray-400
                 focus:ring-2 focus:ring-gray-900/10 focus:border-gray-900 transition resize-none"
          placeholder="How can we help you today?"></textarea>

            @error('message') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-6">

            <button type="submit" wire:loading.attr="disabled"
                    class="w-full sm:w-auto px-8 py-4 bg-white text-black font-bold rounded-full
                        hover:bg-gray-200 transition
                        disabled:opacity-70">
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