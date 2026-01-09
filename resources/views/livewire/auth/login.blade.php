<div class="min-h-screen bg-white flex items-center justify-center font-sans">

    <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 shadow-lg rounded-2xl overflow-hidden">

        <!-- Left Side -->
        <div class="flex flex-col justify-center px-8 py-10 bg-white">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Welcome back</h2>

            <form wire:submit.prevent="login" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email or username</label>
                    <input type="text" wire:model="email"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" wire:model="password"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400">
                </div>

                <button type="submit"
                    class="w-full bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded-lg transition"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove>Login</span>
                    <span wire:loading>Logging in...</span>
                </button>
            </form>
        </div>

        <!-- Right Side -->
      <div class="hidden md:flex items-center justify-center px-6">
    <img src="{{ asset('storage/img1.png') }}" 
         class="max-w-xs md:max-w-sm lg:max-w-md object-contain rounded-lg shadow-lg">
</div>

    </div>

</div>


