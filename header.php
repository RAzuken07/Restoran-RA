<nav class="navbar navbar-expand bg-primary sticky-top">
        <div class="container-lg">
            <a class="navbar-brand link-light" href="."><i class="bi bi-egg-fried"></i> RMrazuk</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle link-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php
                                echo $hasil['username'];
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> profile</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#ModalUbahPassword'><i class="bi bi-key"></i> Ubah Password</a></li>
                            <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>