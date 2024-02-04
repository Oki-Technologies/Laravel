<x-app-layout :data="$head ?? []">
    <x-slot name="header">{{ __('Office') }}</x-slot>
    {{-- <x-slot name="submenu"> --}}
        {{-- <a class="btn btn-primary" data-bs-target="#inviteUserModal" data-bs-toggle="modal" href="javascript:;">
            <i class="bi-person-plus-fill me-1"></i> Invite users
        </a> --}}
    {{-- </x-slot> --}}

    <section class="row">
        <section class="col-lg-12">
            {{ __("You're logged in!") }}
        </section>
    </section>
</x-app-layout>
