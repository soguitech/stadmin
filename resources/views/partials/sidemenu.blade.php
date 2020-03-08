<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href="dashboard-ecommerce.html" class="navbar-brand d-flex align-items-center">
            @if(config('stadmin.path_nav_bar_img'))
                <img src="{{ asset(config('stadmin.path_nav_bar_img')) }}" alt="image">
            @endif
            <span>{{ ucfirst(config('stadmin.title')) }}</span>
        </a>

        <div class="burger-menu d-none d-lg-block">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>

    <div class="sidemenu-body">
        <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
            <li class="nav-item-title">
                Main
            </li>

            <li class="nav-item mm-active">
                <a href="#" class="nav-link">
                    <span class="icon"><i class='bx bx-file'></i></span>
                    <span class="menu-title">Tableau de bord</span>
                </a>
            </li>

            <li class="nav-item-title">Apps</li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-envelope'></i></span>
                    <span class="menu-title">Contacts</span>
                    <span class="badge">0</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="app-email.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-inbox'></i></span>
                            <span class="menu-title">Reception</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="email-read.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-badge-check'></i></span>
                            <span class="menu-title">Lus</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="email-compose.html" class="nav-link">
                            <span class="icon"><i class='bx bx-send'></i></span>
                            <span class="menu-title">Ecrire</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="app-chat.html" class="nav-link">
                    <span class="icon"><i class='bx bx-message'></i></span>
                    <span class="menu-title">Chat</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="app-todo.html" class="nav-link">
                    <span class="icon"><i class='bx bx-badge-check'></i></span>
                    <span class="menu-title">Tâches</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="app-calendar.html" class="nav-link">
                    <span class="icon"><i class='bx bx-calendar'></i></span>
                    <span class="menu-title">Calendrier</span>
                </a>
            </li>

            <li class="nav-item-title">Autres</li>

            <li class="nav-item">
                <a href="grid.html" class="nav-link">
                    <span class="icon"><i class='bx bx-menu'></i></span>
                    <span class="menu-title">Catégories</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="colors.html" class="nav-link">
                    <span class="icon"><i class='bx bxs-tag'></i></span>
                    <span class="menu-title">Tags</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-news'></i></span>
                    <span class="menu-title">Articles</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="boxicons.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-file'></i></span>
                            <span class="menu-title">Tous les articles</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="feathericons.html" class="nav-link">
                            <span class="icon"><i class='bx bx-edit'></i></span>
                            <span class="menu-title">Ajouter un article</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-user'></i></span>
                    <span class="menu-title">Utilisateurs</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="basic-card.html" class="nav-link">
                            <span class="icon"><i class='bx bx-user'></i></span>
                            <span class="menu-title">Tous les utilisateurs</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="colors-card.html" class="nav-link">
                            <span class="icon"><i class='bx bx-user-plus'></i></span>
                            <span class="menu-title">Ajouter un utilisateur</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                    <span class="menu-title">Rôles</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="alerts.html" class="nav-link">
                            <span class="icon"><i class='bx bx-lock-alt'></i></span>
                            <span class="menu-title">Tous les rôles</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="badges.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Ajouter un rôle</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="colors.html" class="nav-link">
                    <span class="icon"><i class='bx bx-shield-quarter'></i></span>
                    <span class="menu-title">Permissions</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-folder'></i></span>
                    <span class="menu-title">Projets</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="alerts.html" class="nav-link">
                            <span class="icon"><i class='bx bx-folder'></i></span>
                            <span class="menu-title">Tous les projets</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="badges.html" class="nav-link">
                            <span class="icon"><i class='bx bx-folder-plus'></i></span>
                            <span class="menu-title">Ajouter un projet</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-camera'></i></span>
                    <span class="menu-title">Media</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="alerts.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Bibliothèque</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="badges.html" class="nav-link">
                            <span class="icon"><i class='bx bx-images'></i></span>
                            <span class="menu-title">Gallerie</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="badges.html" class="nav-link">
                            <span class="icon"><i class='bx bx-image-add'></i></span>
                            <span class="menu-title">Ajouter</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-user-pin'></i></span>
                    <span class="menu-title">Clients</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="alerts.html" class="nav-link">
                            <span class="icon"><i class='bx bx-user-pin'></i></span>
                            <span class="menu-title">Tous les clients</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="badges.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-user-plus'></i></span>
                            <span class="menu-title">Ajouter un client</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="forms.html" class="nav-link">
                    <span class="menu-title">Open source packages</span>
                </a>
            </li>
        </ul>
    </div>
</div>