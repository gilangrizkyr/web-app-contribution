<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url('auth'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="<?= base_url('iuran'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-share"></i></div>
                        Sebar Iuran
                    </a>
                    <div class="sb-sidenav-menu-heading">Pendataan</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data Warga
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('warga') ?>">Tambah Warga</a>
                            <a class="nav-link" href="<?= base_url('pembayaran') ?>">Data Iuran</a>
                            <!-- <a class="nav-link" href="<?= base_url('history'); ?>">History</a> -->
                            <!-- <a class="nav-link" href="<?= base_url('warga/sebar_iuran'); ?>">Sebar Iuran</a> -->
                        </nav>
                    </div>
                    
        </nav>
    </div>
</div>