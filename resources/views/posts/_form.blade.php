<div class="mb-4">
    <label for="title" class="block text-sm font-medium mb-1">Judul</label>
    <input id="title" name="title" type="text" value="{{ old('title', $post->title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-300 @error('title') border-red-500 @else border-slate-300 @enderror">
    @error('title')
        <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>

<div class="mb-4">
    <label for="body" class="block text-sm font-medium mb-1">Isi Post</label>
    <textarea id="body" name="body" rows="8"
              class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-300 @error('body') border-red-500 @else border-slate-300 @enderror">{{ old('body', $post->body ?? '') }}</textarea>
    @error('body')
        <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
