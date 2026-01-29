<div class="relative max-h-[85vh] overflow-y-auto">

    {{-- Inner padding wrapper (IMPORTANT) --}}
    <div class="px-4 sm:px-6 lg:px-8 py-6 sm:py-8 pb-10">

        {{-- Header --}}
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-900">
                Add First Video
            </h3>
            <p class="mt-2 text-sm text-gray-500">
                Upload the first lesson video for this course.
            </p>
        </div>

        <form wire:submit.prevent="save"
              enctype="multipart/form-data"
              class="space-y-6 bg-white rounded-xl">

            {{-- Video Title --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Video Title <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    wire:model.defer="title"
                    placeholder="e.g. Introduction to HTML"
                    class="mt-2 w-full rounded-lg border-gray-300 shadow-sm
                           focus:border-orange-500 focus:ring-orange-500"
                >
                @error('title')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Video Upload --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Upload Video <span class="text-red-500">*</span>
                </label>

                {{-- Upload box --}}
                @if (!$video_file)
                    <label
                        for="video-upload"
                        class="mt-2 flex cursor-pointer items-center justify-center
                               rounded-lg border-2 border-dashed border-gray-300
                               bg-gray-50 px-6 py-10 sm:px-8 sm:py-12 text-center
                               hover:border-orange-400 hover:bg-orange-50 transition"
                    >
                        <div class="space-y-3">
                            <svg class="mx-auto h-8 w-8 text-gray-400"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-9 4h8" />
                            </svg>

                            <p class="text-sm text-gray-600">
                                Click to upload or drag and drop
                            </p>
                            <p class="text-xs text-gray-400">
                                MP4, MOV, AVI
                            </p>
                        </div>
                    </label>
                @endif

                {{-- File input --}}
                <input
                    id="video-upload"
                    type="file"
                    wire:model="video_file"
                    accept="video/*"
                    class="sr-only"
                >

                {{-- Upload progress --}}
                <div wire:loading wire:target="video_file" class="mt-3">
                    <p class="text-xs text-gray-500 mb-1">Uploading video…</p>
                    <progress class="w-full h-2 rounded" max="100"></progress>
                </div>

                {{-- Uploaded file confirmation --}}
                @if ($video_file)
                    <div class="mt-4 flex flex-col sm:flex-row sm:items-center
                                sm:justify-between gap-4
                                rounded-lg border border-green-200
                                bg-green-50 px-4 py-4">
                        <div class="flex items-center gap-3">
                            <svg class="h-6 w-6 text-green-600"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7" />
                            </svg>

                            <div>
                                <p class="text-sm font-medium text-gray-800">
                                    {{ $video_file->getClientOriginalName() }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ number_format($video_file->getSize() / 1048576, 2) }} MB
                                </p>
                            </div>
                        </div>

                        <button
                            type="button"
                            wire:click="$set('video_file', null)"
                            class="text-sm font-medium text-red-600
                                   hover:text-red-700 self-start sm:self-auto"
                        >
                            Remove
                        </button>
                    </div>
                @endif

                @error('video_file')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Thumbnail --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Thumbnail <span class="text-gray-400">(optional)</span>
                </label>
                <input
                    type="file"
                    wire:model="thumbnail_file"
                    accept="image/*"
                    class="mt-2 block w-full text-sm text-gray-700
                           file:mr-4 file:rounded-md
                           file:border-0
                           file:bg-orange-50 file:px-4 file:py-2
                           file:text-sm file:font-medium
                           file:text-orange-700
                           hover:file:bg-orange-100"
                >
                @error('thumbnail_file')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Duration --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Duration (seconds)
                </label>
                <input
                    type="number"
                    wire:model.defer="duration"
                    placeholder="e.g. 320"
                    min="1"
                    class="mt-2 w-full rounded-lg border-gray-300 shadow-sm
                           focus:border-orange-500 focus:ring-orange-500"
                >
            </div>

            {{-- Footer Actions --}}
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center
                        justify-end gap-3
                        pt-6 mt-8
                        border-t border-gray-200">

                <button
                    type="button"
                    wire:click="$dispatch('close-modal', 'add-first-video-modal')"
                    wire:loading.attr="disabled"
                    wire:target="save"
                    class="w-full sm:w-auto
                           inline-flex items-center justify-center
                           rounded-lg border border-gray-300
                           bg-white px-4 py-2
                           text-sm font-medium text-gray-700
                           hover:bg-gray-100
                           disabled:opacity-60 disabled:cursor-not-allowed"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    wire:target="save"
                    class="w-full sm:w-auto
                           inline-flex items-center justify-center gap-2
                           rounded-lg bg-orange-600
                           px-5 py-2.5
                           text-sm font-semibold text-white
                           hover:bg-orange-700
                           disabled:opacity-60 disabled:cursor-not-allowed"
                >
                    <span wire:loading.remove wire:target="save">
                        Save Video
                    </span>

                    <span wire:loading wire:target="save" class="flex items-center gap-2">
                        <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/>
                        </svg>
                        Uploading…
                    </span>
                </button>
            </div>

        </form>
    </div>
</div>
