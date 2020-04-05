<div class="modal animated fadeIn" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('stadmin.roles') }}" method="post" data-toogle="validator">
                @csrf {{ method_field('POST') }}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="name">NOM DU RÔLE</label>
                        <input type="text" name="name" placeholder="Nom du rôle" class="form-control" id="name" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="permission">PERMISSIONS ASSOCIÉES</label>
                        <select class="selectpicker form-control" multiple data-selected-text-format="count > 4" name="permissions[]"  title="Choisir les permissions..." id="permission" required>
                            <option>Selectionner les permissions</option>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="insertbutton">>Ajouter</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">FERMER</button>
                </div>
            </form>
        </div>
    </div>
</div>
