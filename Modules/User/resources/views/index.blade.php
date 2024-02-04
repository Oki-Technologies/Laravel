<x-tenant-layout :data="$head ?? []">
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('user.name') !!}
    </p>
</x-tenant-layout>
