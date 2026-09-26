<div class="space-y-5">

    <div>
        <label class="mb-1 block font-medium">Name</label>

        <input
            name="name"
            value="{{ old('name', $employee->name ?? '') }}"
            required
            class="w-full rounded-lg border px-4 py-2"
        >

        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block font-medium">Email</label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $employee->email ?? '') }}"
            required
            class="w-full rounded-lg border px-4 py-2"
        >

        @error('email')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block font-medium">Position</label>

        <input
            name="position"
            value="{{ old('position', $employee->position ?? '') }}"
            required
            class="w-full rounded-lg border px-4 py-2"
        >

        @error('position')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

</div>
