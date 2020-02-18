<h1>Nom du role : {{ $role->name }}</h1>

<h2>Permissions associé</h2>
{{ $role->permissions->pluck('name') }}

<hr>

<form action="">
    @csrf
    <select name="name" id="">
        <option value=""></option>
        @foreach($permissions as $permission)
            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
        @endforeach
    </select>
</form>
