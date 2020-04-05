<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="http://www.wrraptheme.com/templates/lucid/hr/html/assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Bienvenue,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ stadmin_auth()->firstName }} {{ stadmin_auth()->lastName }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account animated flipInY">
                    <li><a href="page-profile2.html"><i class="icon-user"></i>Mon Profil</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Paramètres</a></li>
                    <li class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('stadmin.logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Deconnexion') }}
                        </a>
                        <form id="logout-form" action="{{ route('stadmin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <h6>5+</h6>
                    <small>Experience</small>
                </div>
                <div class="col-4">
                    <h6>80+</h6>
                    <small>Clients</small>
                </div>
            </div>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sub_menu"><i class="icon-grid"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#project_menu">Projet</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane animated fadeIn active" id="sub_menu">
                <nav class="sidebar-nav">
                    <ul class="main-menu metismenu">
                        <li>
                            <a href="#Blog" class="has-arrow"><i class="icon-globe"></i> <span>Blog</span></a>
                            <ul>
                                <li><a href="blog-dashboard.html">Tableau de bord</a></li>
                                <li><a href="blog-post.html">Nouveau post</a></li>
                                <li><a href="blog-list.html">Tous les blogs</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#FileManager" class="has-arrow"><i class="icon-folder"></i> <span>Gestion des fichiers</span></a>
                            <ul>
                                <li><a href="file-dashboard.html">Tableau de bord</a></li>
                                <li><a href="file-documents.html">Documents</a></li>
                                <li><a href="file-media.html">Media</a></li>
                                <li><a href="file-images.html">Images</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('stadmin.users') }}"><i class="icon-users"></i>Utilisateurs</a></li>
                        <li><a href="project-team.html"><i class="icon-users"></i>Categories</a></li>
                        <li><a href="project-team.html"><i class="icon-users"></i>Tags</a></li>
                        <li><a href="{{ route('stadmin.roles') }}"><i class="icon-users"></i>Rôles</a></li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane animated fadeIn" id="project_menu">
                <nav class="sidebar-nav">
                    <ul class="main-menu metismenu">
                        <li><a href="index2.html"><i class="icon-speedometer"></i><span>Tableau de bord</span></a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope"></i>Inbox</a></li>
                        <li><a href="app-chat.html"><i class="icon-bubbles"></i>Chat</a></li>
                        <li>
                            <a href="#Projects" class="has-arrow"><i class="icon-list"></i><span>Projets</span></a>
                            <ul>
                                <li><a href="project-add.html">Ajout de Projet</a></li>
                                <li><a href="project-list.html">Tous les Projets</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Clients" class="has-arrow"><i class="icon-user"></i><span>Clients</span></a>
                            <ul>
                                <li><a href="client-add.html">Ajout de Client</a></li>
                                <li><a href="client-list.html">Tous les Clients</a></li>
                            </ul>
                        </li>
                        <li><a href="project-team.html"><i class="icon-users"></i>Equipe</a></li>
                        <li><a href="app-taskboard.html"><i class="icon-tag"></i>Taskboard</a></li>
                        <li><a href="app-tickets.html"><i class="icon-screen-tablet"></i>Tickets</a></li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane animated fadeIn" id="setting">
                <div class="p-l-15 p-r-15">
                    <h6>Choose Skin</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="orange" class="active">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                            <span>Blush</span>
                        </li>
                    </ul>
                    <hr>
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Report Panel Usag</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Email Redirect</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Notifications</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Auto Updates</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Offline</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Location Permission</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>