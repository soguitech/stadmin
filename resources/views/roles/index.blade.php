    <h1>Showing all Roles</h1>

    @forelse ($roles as $role)
        <li><a href="{{ route('roles.show', $role) }}">{{ $role->name }}</a></li>
    @empty
        <p> 'No roles yet' </p>
    @endforelse

