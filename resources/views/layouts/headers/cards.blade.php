<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pemasukan</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$count}}</span>
                                    <?php 
                                        
                                        // foreach ($masuk as $ms) {
                                        //     echo $ms->id;
                                        // }
                                    ?>
                                    <!-- <span class="h2 font-weight-bold mb-0"></span> -->
                                    <!-- <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <tbody class="list">
                                           
                                            </tbody>
                                        </table>
                                    </div> -->
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-inbox"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pengeluaran</h5>
                                    <!-- <span class="h2 font-weight-bold mb-0">200</span> -->
                                    <span class="h2 font-weight-bold mb-0">{{$count1}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-sign-out-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Stok Paling Banyak</h5>
                                    <!-- <span class="h2 font-weight-bold mb-0">Produk</span> -->
                                    <span class="h2 font-weight-bold mb-0">{{$max->nama_barang}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-boxes"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Stok Paling Sedikit</h5>
                                    <!-- <span class="h2 font-weight-bold mb-0">49,65%</span> -->
                                    <span class="h2 font-weight-bold mb-0">{{$min->nama_barang}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-box"></i>
                                    </div>
                                </div>
                            </div>
                                    
                                    
                            <!-- <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span> 
                                <span class="text-nowrap">Admin BPBD Kab/Kota</span>
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>