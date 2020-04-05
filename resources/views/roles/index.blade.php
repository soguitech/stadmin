@extends('stadmin::partials.app')

@section('style')
    <link rel="stylesheet" href="{{ stadmin_css_asset('dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ stadmin_css_asset('sweetalert.css') }}">
    <link rel="stylesheet" href="{{ stadmin_css_asset('bootstrap-select.min.css') }}">
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Rôles et Permissions</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('stadmin.dash') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Rôles et Permissions</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small>Visitors</small>
                                <h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
                            </div>
                            <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Visits</small>
                                <h6 class="mb-0 mt-1"><i class="icon-globe"></i> 325</h6>
                            </div>
                            <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Chats</small>
                                <h6 class="mb-0 mt-1"><i class="icon-bubbles"></i> 13</h6>
                            </div>
                            <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <ul class="header-dropdown">
                                <li><a href="javascript:void(0);" onclick="addForm()" class="btn btn-info">Ajout de rôle</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="role-table" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>Nom du rôle</th>
                                        <th>Permissions associées</th>
                                        <th>Utilisateur(s) associé(s)</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('stadmin::roles.form');
@endsection

@section('script')
    <script src="{{ stadmin_js_asset('jquery.dataTables.min.js') }}"></script>
    <script src="{{ stadmin_js_asset('dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ stadmin_js_asset('bootstrap-colorpicker.js') }}"></script>
    <script src="{{ stadmin_js_asset('sweetalert.min.js') }}"></script>
    <script src="{{ stadmin_js_asset('validator/validator.min.js') }}"></script>
    <script src="{{ stadmin_js_asset('bootstrap-select.min.js') }}"></script>
    <script type="text/javascript">
        let tableRole = $('#role-table').DataTable({
            "searching": false,
            "paging":   false,
            "info":     false,
            "ordering": false,
            "processing": true,
            "serverSide": true,
            ajax:  {
                url: "{{ route('stadmin.all.roles') }}",
                dataSrc: ''
            },
            columns: [
                {data:'name', name:'name'},
                {data:'permission', name:'permission'},
                {data:'user', name:'user'},
                {data:'action', name:'action'}
            ]
        });

        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Ajout de rôle');
            $('#insertbutton').text('Ajouter');
        }

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    let id = $('#id').val();
                    let url;
                    if (save_method === 'add') url = "{{ route('stadmin.roles.add') }}";
                    else url = "{{ url('/stadmin/roles') }}" + '/' + id;
                    $.ajax({
                        url : url,
                        type : "POST",
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            tableRole.ajax.reload();
                            swal({
                                title: "Bien fait!",
                                text: "Ajout du rôle reussi!",
                                type: "success",
                                icon: "success",
                                button: "Génial!",
                            });
                        },
                        error : function(data){
                            swal({
                                title: 'Oups...',
                                text: data.responseText,
                                type: 'error',
                                timer: '2000'
                            })
                        }
                    });
                    return false;
                }
            });
        });

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{ url('stadmin/roles') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var $el = document.getElementById('permission');
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edition de Rôle');
                    $('#insertbutton').text('Mettre à jour');
                    $('#id').val(data.id);
                    $('#name').val(data.name);

                    for(var j = 0; j < data.permissions.length; j++) {
                        for ( var i = 0, len = $el.options.length; i < len; i++ ) {
                            if(parseInt($el.options[i].value) === parseInt(data.permissions[j].id)) {
                                $el.options[i].selected = true;
                            }
                        }
                    }

                    $('#permission').selectpicker('render');
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }

        function deleteData(id) {
            let csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Êtes-vous sûre?",
                text: "Il est possible que la suppression de ce rôle affecte d'autres utilisateurs." +
                    " Les utilisateurs liés a ce rôle seront automatiquement attribués au rôle 'GUEST'!",
                icon: "warning",
                showCancelButton: true,
                closeOnConfirm: true,
                buttons: true,
                dangerMode: true,
                confirmButtonText: "Oui, supprimer!",
            }, function () {
                $.ajax({
                    url: "{{ url('/stadmin/roles/delete') }}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        tableRole.ajax.reload();
                        swal({
                            title: "Supprimé!",
                            text: "Suppression du rôle réussi!",
                            type: "success",
                            icon: "success",
                            button: "Fait!",
                        });
                    },
                    error: function (data) {
                        swal({
                            title: 'Oups...',
                            text: data.responseText,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            })
        }

    </script>
    <!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>-->
@endsection
