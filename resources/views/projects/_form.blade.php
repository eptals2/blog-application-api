<div class="space-y-5">

    <div>
        <label class="mb-1 block font-medium">
            Project Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $project->name ?? '') }}"
            required
            class="w-full rounded-lg border px-4 py-2"
        >

        @error('name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block font-medium">
            Description
        </label>

        <textarea
            name="description"
            rows="5"
            class="w-full rounded-lg border px-4 py-2"
        >{{ old('description', $project->description ?? '') }}</textarea>

        @error('description')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

</div>
