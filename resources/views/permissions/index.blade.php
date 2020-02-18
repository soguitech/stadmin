    <h1>Showing all Permissions</h1>

    @forelse ($permissions as $permission)
        <li><a href="{{ route('permissions.show', $permission) }}">{{ $permission->name }}</a></li>
    @empty
        <p> 'No permissions yet' </p>
    @endforelse

